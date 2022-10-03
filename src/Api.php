<?php

namespace CoinMarketCap;

use CoinMarketCap\Features\Cryptocurrency;
use CoinMarketCap\Features\Fiat;

class Api
{
    private $apiKey;
    private $cryptocurrency = null;
    private $fiat = null;

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

    /**
     * @return Fiat
     */
    public function fiat(): Fiat
    {
        $this->fiat = new Fiat($this->apiKey, 'fiat/');
        return $this->fiat;
    }
}
