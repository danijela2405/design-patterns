<?php

namespace FactoryMethod;


use Psr\SimpleCache\CacheInterface;

abstract class MediaMetadataFactory implements MediaMetadataFactoryInterface
{
    /**
     * @var CacheInterface
     */
    private $cache;

    /**
     * MediaMetadataFactory constructor.
     * @param $cache
     */
    public function __construct(CacheInterface $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param string $file
     * @return MediaMetadataInterface
     */
    public function loadMetadata(string $file): MediaMetadataInterface
    {
        $file = new \SplFileInfo($file);
        if ($metadata = $this->cache->get($file->getRealPath())) {
            return $metadata;
        }
        $metadata = $this->readMetadata($file);
        $this->cache->set($file->getRealPath(), $metadata);

        return $metadata;
    }

    abstract protected function readMetadata(\SplFileInfo $file) : MediaMetadataInterface;
}