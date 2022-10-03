<?php

namespace CoinMarketCap\Features;

use CoinMarketCap\Utils\ApiRequest;

class Fiat extends ApiRequest
{
    /**
     * Fiat constructor.
     * @param string $apiKey
     */
    public function __construct($apiKey, $path)
    {
        parent::__construct($apiKey, $path);
    }

    /**
     * @param array $params ["start", "limit", "sort", "include_metals"]
     * @return mixed
     * @throws \Exception
     */
    public function map($params = [])
    {
        return $this->get('map', $params);
    }
}
