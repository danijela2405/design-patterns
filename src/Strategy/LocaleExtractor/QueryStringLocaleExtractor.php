<?php

namespace Strategy\LocaleExtractor;

use Strategy\LocaleExtractorInterface;
use Strategy\LocaleNotFoundException;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class QueryStringLocaleExtractor
 * @package Strategy\LocaleExtractor
 */
class QueryStringLocaleExtractor implements LocaleExtractorInterface
{

    private $parameter;

    /**
     * QueryStringLocaleExtractor constructor.
     * @param $parameter
     */
    public function __construct($parameter = 'lang')
    {
        $this->parameter = $parameter;
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function extractLocale(Request $request, array $supportedLocales)
    {
        if (!$locale = $request->query->get($this->parameter)){
            throw new LocaleNotFoundException('bbla');
        }

        return $locale;
    }
}