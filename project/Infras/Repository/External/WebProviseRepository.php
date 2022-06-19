<?php

namespace Infras\Repository\External;

use Infras\External\APIClient\BaseClient;
use Infras\Model\BaseModel;
use Infras\Repository\BaseRepository;

abstract class WebProviseRepository implements BaseRepository
{
    protected BaseClient $client;

    protected array $items;

    protected string $baseUrl = 'https://5f27781bf5d27e001612e057.mockapi.io/webprovise/';

    protected string $resource;

    protected BaseModel $model;

    public function __construct(BaseClient $client, BaseModel $model)
    {
        $this->client = $client;
        $this->model = $model;
    }

    public function getData()
    {
        try {
            $response = $this->client->get($this->baseUrl . $this->resource);

            return json_decode($response, true);
        } catch (\Exception $e) {
            //Log error

            return [];
        }
    }

    public function syncData(): void
    {
        $rawData = $this->getData();

        $this->items = array_map(function (array $rawCompany) {
            return $this->model->fromArray($rawCompany);
        }, $rawData);
    }

    public function getAll(): array
    {
        return $this->items;
    }
}