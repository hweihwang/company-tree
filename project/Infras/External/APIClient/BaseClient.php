<?php

namespace Infras\External\APIClient;

interface BaseClient
{
    public function get(string $url): mixed;
}