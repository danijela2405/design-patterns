<?php

namespace Strategy\LocaleExtractor;

use Negotiation\AcceptLanguage;
use Negotiation\LanguageNegotiator;
use Negotiation\Negotiator;
use Strategy\LocaleExtractorInterface;
use Strategy\LocaleNotFoundException;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AcceptHeaderLocaleExtractor
 * @package Strategy\LocaleExtractor
 */
class AcceptHeaderLocaleExtractor implements LocaleExtractorInterface
{
    /**
     * @var LanguageNegotiator
     */
    private $negotiator;

    /**
     * AcceptHeaderLocaleExtractor constructor.
     * @param LanguageNegotiator $negotiator
     */
    public function __construct(LanguageNegotiator $negotiator)
    {
        $this->negotiator = $negotiator;
    }

    /**
     * @param Request $request
     * @throws LocaleNotFoundException when locale is not guessable
     */
    public function extractLocale(Request $request, array $supportedLocales)
    {
        if(!$value = $request->headers->get('Accept-Language')){
            throw new LocaleNotFoundException('jfi');
        }

        if(!$locale = $this->negotiator->getBest($value, $supportedLocales)){
            throw new LocaleNotFoundException('blabla');
        }

        return $locale->getValue();
    }
}