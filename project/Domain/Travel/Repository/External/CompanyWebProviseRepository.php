<?php

namespace Domain\Travel\Repository\External;

use Domain\Travel\Model\Company;
use Domain\Travel\Repository\CompanyRepository;
use Infras\External\APIClient\BaseClient;
use Infras\Repository\External\WebProviseRepository;

class CompanyWebProviseRepository extends WebProviseRepository implements CompanyRepository
{
    protected string $resource = 'companies';

    public function __construct(BaseClient $client)
    {
        $model = new Company();

        parent::__construct($client, $model);
    }
}