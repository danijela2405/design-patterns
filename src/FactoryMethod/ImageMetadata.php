<?php

namespace FactoryMethod;


class ImageMetadata extends MediaMetadata
{
    private $width;
    private $height;

    /**
     * ImageMetadata constructor.
     * @param $path
     * @param $size
     * @param $width
     * @param $height
     */
    public function __construct($path, $size, $width, $height)
    {
        parent::__construct($path, $size);
        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

}