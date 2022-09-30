<?php

namespace CoinMarketCap;

use CoinMarketCap\Features\Cryptocurrency;
use CoinMarketCap\Features\Tools;

class Api
{
    private static $apiKey;
    private static $cryptocurrency = null;
    private static $tools = null;

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

    /**
     * @return Tools
     */
    public static function tools(): Tools
    {
        self::$tools = self::$tools ?: new Tools(self::$apiKey);
        return self::$tools;
    }
}
