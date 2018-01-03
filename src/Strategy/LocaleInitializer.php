<?php

namespace Strategy;

use Mediator\EventManager;
use Mediator\EventManagerInterface;
use Mediator\NullEventManager;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class LocaleInitializer
 * @package Strategy
 */
class LocaleInitializer
{

    /**
     * @var LocaleExtractorInterface
     */
    private $extractor;

    /**
     * @var array
     */
    private $supportedLocales;

    /**
     * @var string
     */
    private $fallbackLocale;
    /**
     * @var EventManagerInterface
     */
    private $eventManager;

    /**
     * LocaleInitializer constructor.
     * @param LocaleExtractorInterface $extractor
     * @param array $supportedLocales
     * @param $fallbackLocale
     * @param EventManagerInterface $eventManager
     */
    public function __construct(
        LocaleExtractorInterface $extractor,
        array $supportedLocales,
        $fallbackLocale,
        EventManagerInterface $eventManager = null
    ) {
        $this->extractor = $extractor;
        $this->supportedLocales = $supportedLocales;
        $this->fallbackLocale = $fallbackLocale;
        $this->eventManager = $eventManager ?: new NullEventManager();
    }

    public function initialize(Request $request)
    {
        $locale = $this->fallbackLocale;
        try {

            $locale = $this->extractor->extractLocale($request, $this->supportedLocales);
        } catch (LocaleNotFoundException $exception) {

        }

        if (!in_array($locale, $this->supportedLocales)) {
            $locale = $this->fallbackLocale;
        }

        \Locale::setDefault($locale);
        $this->eventManager->fire('locale.changed',new LocaleEvent($locale));
    }

}