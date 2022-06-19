<?php

namespace Domain\Travel\Model;

use Infras\Model\BaseModel;

class Travel implements BaseModel
{
    public string $id;
    public string $companyId;
    public string $employeeName;
    public string $departure;
    public string $destination;
    public string $createdAt;
    public float $price;

    public function fromArray(array $data): static
    {
        $static = new static();

        $static->id = $data['id'];
        $static->companyId = $data['companyId'];
        $static->employeeName = $data['employeeName'];
        $static->departure = $data['departure'];
        $static->destination = $data['destination'];
        $static->createdAt = $data['createdAt'];
        $static->price = (float) $data['price'];

        return $static;
    }
}