<?php

namespace App\WebProviseProject\Transportation\Scripts;

use App\WebProviseProject\Transformers\CompanyTransformer;
use Domain\Travel\Collection\CompanyTreeCollection;
use Domain\Travel\Model\Company;
use Domain\Travel\Model\Travel;
use Domain\Travel\Repository\External\CompanyWebProviseRepository;
use Domain\Travel\Repository\External\TravelWebProviseRepository;
use Infras\External\APIClient\CurlClient;

class BuildCompanyTree
{
    public function execute(string $outputFile = 'company_tree.json'): void
    {
        $apiClient = new CurlClient();

        $companyRepository = new CompanyWebProviseRepository($apiClient);
        $companyRepository->syncData();
        $companies = $companyRepository->getAll();

        $travelRepository = new TravelWebProviseRepository($apiClient);
        $travelRepository->syncData();
        $travels = $travelRepository->getAll();

        $companyTransformer = new CompanyTransformer();
        $companyCollection = new CompanyTreeCollection($companyTransformer);
        $companyCollection->build($companies, $travels);

        file_put_contents($outputFile, $companyCollection->serialize());
    }
}