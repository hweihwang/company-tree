<?php

namespace Infras\Model;

interface BaseModel
{
    public function fromArray(array $data): static;
}