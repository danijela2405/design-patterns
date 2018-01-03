<?php
namespace Tests\FactoryMethod;


use FactoryMethod\ImageMetadata;
use FactoryMethod\ImageMetadataFactory;
use PHPUnit\Framework\TestCase;
use Psr\SimpleCache\CacheInterface;

class ImageMetadataFactoryTest extends TestCase
{
    public function testLoadMetadata(): void
    {
        $factory = new ImageMetadataFactory($this->createMock(CacheInterface::class));
        $metadata = $factory->loadMetadata(__DIR__.'/../Fixtures/IMG_1798.jpg');

        $this->assertInstanceOf(ImageMetadata::class, $metadata);


        if($metadata instanceof ImageMetadata){
            $this->assertSame(1920, $metadata->getWidth());
        }
    }
}