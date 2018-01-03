<?php

namespace Tests\Strategy;

use Mediator\EventManager;
use Negotiation\LanguageNegotiator;
use PHPUnit\Framework\TestCase;
use Strategy\LocaleExtractor\AcceptHeaderLocaleExtractor;
use Strategy\LocaleExtractor\QueryStringLocaleExtractor;
use Strategy\LocaleInitializer;
use Strategy\LocaleLoggerListener;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class LocaleInitializerTest
 * @package Tests\Strategy
 */
class LocaleInitializerTest extends TestCase
{
    private const LOCALES = ['fr-FR', 'de-DE', 'en-EN'];

    /**
     * @dataProvider provideLocales
     */
    public function testGuessLocaleFromQueryString($expectedLocale, $requestedLocale)
    {
     //   $eventManager = new EventManager();
       // $eventManager->listen('locale.changed', [new LocaleLoggerListener($logger)], 'onLocaleChanged');

        $initializer = new LocaleInitializer(
            new QueryStringLocaleExtractor(),
            self::LOCALES,
            'fr-FR'
           // $eventManager
        );

        $request = Request::create('/?lang='.$requestedLocale);

        $initializer->initialize($request);

        $this->assertSame($expectedLocale, \Locale::getDefault());
    }

    /**
     * @dataProvider provideLocales
     */
    public function testGuessLocaleFromAcceptLanguageHeader($expectedLocale, $requestedLocale)
    {
        $request = Request::create('/');

        $request->headers->set('Accept-Language', sprintf('%s', $requestedLocale));

        $initializer = new LocaleInitializer(
            new AcceptHeaderLocaleExtractor(new LanguageNegotiator()),
            self::LOCALES,
            'fr-FR'
        );


        $initializer->initialize($request);

        $this->assertSame($expectedLocale, \Locale::getDefault());
    }

    public function provideLocales()
    {
        yield['de-DE', 'de-DE'];
        yield['fr-FR', 'fr-FR'];
        yield['en-EN', 'en-EN'];
        yield['fr-FR', 'it-IT'];
        yield['fr-FR', 'ru-RU'];
        yield['fr-FR', ''];
    }

    protected function setUp()
    {
        \Locale::setDefault('en-EN');
    }

    protected function tearDown()
    {
        \Locale::setDefault('en-EN');
    }

}