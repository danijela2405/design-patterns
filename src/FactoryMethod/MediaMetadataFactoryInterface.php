<?php

namespace FactoryMethod;

/**
 * Interface MediaMetadataFactoryInterface
 * @package FactoryMethod
 */
interface MediaMetadataFactoryInterface
{
    /**
     * @param string $file
     * @return MediaMetadataInterface
     */
    public function loadMetadata(string $file): MediaMetadataInterface;
}