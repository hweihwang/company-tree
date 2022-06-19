<?php

namespace Domain\Travel\Contract;

use Infras\Collection\Node;

abstract class CalculateNodesCost extends Node implements CalculateCost
{
    public float $cost = 0;

    public float $directCost = 0;

    public function addCost(float $cost): void
    {
        $this->cost += $cost;

        if($this->parentId !== '0') {
            $this->parent->addCost($cost);
        }
    }

    public function calculateCost(): float
    {
        $cost = $this->directCost;

        if ($this->children) {
            foreach ($this->children as $child) {
                $cost += $child->calculateCost();
            }
        }

        return $cost;
    }
}