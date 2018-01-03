<?php

namespace FactoryMethod;

/**
 * Class PlainTextMetadata
 * @package FactoryMethod
 */
class PlainTextMetadata extends MediaMetadata
{

    private $linesCount;

    /**
     * PlainTextMetadata constructor.
     * @param $linesCount
     * @param $path
     * @param $size
     */
    public function __construct($path, $size, $linesCount)
    {
        parent::__construct($path, $size);
        $this->linesCount = $linesCount;
    }

    /**
     * @return int
     */
    public function getLinesCount()
    {
        return $this->linesCount;
    }
}