<?php

namespace FactoryMethod;

/**
 * Interface MediaMetadataInterface
 * @package FactoryMethod
 */
interface MediaMetadataInterface
{
    /**
     * @return string
     */
    public function getPath(): string;

    /**
     * @return int
     */
    public function getSize(): int;
}