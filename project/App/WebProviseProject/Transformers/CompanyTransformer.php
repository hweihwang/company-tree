<?php

namespace App\WebProviseProject\Transformers;

use Domain\Travel\Model\Company;
use Infras\Transformers\BaseTransformer;

class CompanyTransformer implements BaseTransformer
{
    protected Company $model;

    public function setModel(Company $model): static
    {
        $this->model = $model;

        return $this;
    }

    public function transform(): array
    {
        return [
            'id' => $this->model->id,
            'name' => $this->model->name,
            'cost' => $this->model->cost,
            'children' => $this->model->children,
        ];
    }
}