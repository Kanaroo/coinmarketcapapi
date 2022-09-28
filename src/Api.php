<?php

namespace CoinMarketCap;

use CoinMarketCap\Features\Cryptocurrency;
class Api
{
    private static $apiKey;
    private static $cryptocurrency = null;

    public function __construct($apiKey)
    {
        self::$apiKey = $apiKey;
    }

    /**
     * @return Cryptocurrency
     */
    public static function cryptocurrency(): Cryptocurrency
    {
        self::$cryptocurrency = self::$cryptocurrency ?: new Cryptocurrency(self::$apiKey);
        return self::$cryptocurrency;
    }
}
