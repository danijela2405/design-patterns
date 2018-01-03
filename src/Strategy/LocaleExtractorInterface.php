<?php

namespace Strategy;

use Symfony\Component\HttpFoundation\Request;

/**
 * Class LocaleExtractorInterface
 * @package Strategy
 */
interface LocaleExtractorInterface
{
    /**
     * @param Request $request
     * @throws LocaleNotFoundException when locale is not guessable
     */
    public function extractLocale(Request $request, array $supportedLocales);

}