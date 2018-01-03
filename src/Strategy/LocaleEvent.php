<?php

namespace Strategy;

use Mediator\Event;

/**
 * Class LocaleEvent
 * @package Strategy
 */
class LocaleEvent extends Event
{
    /**
     * @var
     */
    private $locale;

    /**
     * LocaleEvent constructor.
     * @param string $locale
     */
    public function __construct(string $locale)
    {
        $this->locale = $locale;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }
}