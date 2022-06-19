<?php

namespace Infras\Collection;

abstract class Node
{
    public string $parentId = '0';

    public string $id;

    public array $children = [];

    public mixed $parent = null;

    public function setParent(self $parent): void
    {
        $this->parent = $parent;
    }
}