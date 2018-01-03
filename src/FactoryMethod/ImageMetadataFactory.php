<?php

namespace FactoryMethod;

class ImageMetadataFactory extends MediaMetadataFactory
{
    protected function readMetadata(\SplFileInfo $file): MediaMetadataInterface
    {
        $size = getimagesize($file->getRealPath());

        if (!$size) {
            throw new \RuntimeException("blabla");
        }

        return new ImageMetadata(
            $file->getRealPath(),
            $file->getSize(),
            $size[0],
            $size[1]
        );
    }
}