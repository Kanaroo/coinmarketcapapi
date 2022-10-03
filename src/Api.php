<?php

namespace CoinMarketCap;

use CoinMarketCap\Features\Cryptocurrency;

class Api
{
    private $apiKey;
    private $cryptocurrency = null;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @return Cryptocurrency
     */
    public function cryptocurrency(): Cryptocurrency
    {
        $this->cryptocurrency = new Cryptocurrency($this->apiKey, 'cryptocurrency/');
        return $this->cryptocurrency;
    }
}
