<?php

namespace Mediator;

/**
 * Interface ConfigurableEventManagerInterface
 * @package Mediator
 */
interface ConfigurableEventManagerInterface extends EventManagerInterface
{
    public function listen(string $eventName, callable $callback): void;

}