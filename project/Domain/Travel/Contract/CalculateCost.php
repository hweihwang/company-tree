<?php

namespace Domain\Travel\Contract;

interface CalculateCost
{
    public function addCost(float $cost);

    public function calculateCost();
}