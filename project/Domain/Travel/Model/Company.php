<?php

namespace Domain\Travel\Model;

use Domain\Travel\Contract\CalculateNodesCost;
use Infras\Model\BaseModel;

class Company extends CalculateNodesCost implements BaseModel
{
    public string $name;

    public string $createdAt;

    public function fromArray(array $data): static
    {
        $static = new static();

        $static->id = $data['id'];
        $static->name = $data['name'];
        $static->createdAt = $data['createdAt'];
        $static->parentId = $data['parentId'];

        return $static;
    }
}