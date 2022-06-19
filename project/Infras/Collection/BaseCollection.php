<?php

namespace Infras\Collection;

abstract class BaseCollection
{
    public array $items = [];

    public abstract function build(...$args);

    public function serialize(): string
    {
        return json_encode($this->items, JSON_PRETTY_PRINT);
    }
}