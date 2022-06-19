<?php

namespace Domain\Travel\Repository\External;

use Domain\Travel\Model\Travel;
use Domain\Travel\Repository\TravelRepository;
use Infras\External\APIClient\BaseClient;
use Infras\Repository\External\WebProviseRepository;

class TravelWebProviseRepository extends WebProviseRepository implements TravelRepository
{
    protected string $resource = 'travels';

    public function __construct(BaseClient $client)
    {
        $model = new Travel();

        parent::__construct($client, $model);
    }
}