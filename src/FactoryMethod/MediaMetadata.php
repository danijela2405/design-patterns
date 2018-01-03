<?php
namespace FactoryMethod;


abstract class MediaMetadata implements MediaMetadataInterface
{
    private $path;
    private $size;

    /**
     * MediaMetadata constructor.
     * @param $path
     * @param $size
     */
    public function __construct($path, $size)
    {
        $this->path = $path;
        $this->size = $size;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

}