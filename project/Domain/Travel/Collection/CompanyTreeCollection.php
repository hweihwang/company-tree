<?php

namespace Domain\Travel\Collection;

use App\WebProviseProject\Transformers\CompanyTransformer;
use Infras\Collection\BaseCollection;

class CompanyTreeCollection extends BaseCollection
{
    public function __construct(protected CompanyTransformer $transformer)
    {
    }

    public function build(...$args)
    {
        $companies = $args[0];
        $travels = $args[1];

        $arrChild = [];

        foreach ($companies as $obj) {
            $arrChild[$obj->parentId][] = $obj->id;
            $companies[$obj->id] = $obj;
            $companies[$obj->id]->setParent($companies[$obj->parentId]);
        }

        foreach ($travels as $obj) {
            ($companies[$obj->companyId])->addCost($obj->price);
        }

        $setChild = function (&$array, $parents) use (&$setChild, $companies, $arrChild) {
            foreach ($parents as $parent) {
                $temp = $companies[$parent];

                if (isset($arrChild[$parent])) {
                    $setChild($temp->children, $arrChild[$parent]);
                }

                $array[] = $this->transformer->setModel($temp)->transform();
            }
        };

        $setChild($this->items, $arrChild['0']);
    }
}