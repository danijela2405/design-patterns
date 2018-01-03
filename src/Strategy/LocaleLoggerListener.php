<?php

namespace Strategy;

use Psr\Log\LoggerInterface;

/**
 * Class LocaleLoggerListener
 * @package Strategy
 */
class LocaleLoggerListener
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * LocaleLoggerListener constructor.
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function onLocaleChanged(LocaleEvent $event): void
    {
        $this->logger->info(sprintf('changed locale to %s jhrfkerlg', $event->getLocale()));
    }
}