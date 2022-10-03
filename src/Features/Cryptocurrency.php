<?php

namespace CoinMarketCap\Features;

use CoinMarketCap\Utils\ApiRequest;

/**
 * Cryptocurrency
 */
class Cryptocurrency extends ApiRequest
{
    /**
     * Cryptocurrency constructor.
     * @param string $apiKey
     */
    public function __construct($apiKey, $path)
    {
        parent::__construct($apiKey, $path);
    }

    /**
     * @param array $params ["listing_status", "start", "limit", "sort", "symbol", "aux"]
     * @return mixed
     * @throws \Exception
     */
    public function map($params = [])
    {
        return $this->get('map', $params);
    }

    /**
     * @param array $params ["id", "slug", "symbol", "aux"]
     * @return mixed
     * @throws \Exception
     */
    public function info($params = [])
    {
        return $this->get('info', $params);
    }

    /**
     * @param array $params ["start", "limit", "volume_24h_min", "convert", "convert_id", "sort", "sort_dir", "cryptocurrency_type", "aux"]
     * @return mixed
     * @throws \Exception
     */
    public function listingsLatest($params)
    {
        return $this->get('listings/latest', $params);
    }

    /**
     * @param array $params ["id", "slug", "symbol", "convert", "convert_id", "aux", "skip_invalid"]
     * @return mixed
     * @throws \Exception
     */
    public function quotesLatest($params = [])
    {
        return $this->get('quotes/latest', $params);
    }

    /**
     * @param array $params ["start", "limit", "time_period", "convert", "convert_id" ]
     * @return mixed
     * @throws \Exception
     */
    public function trendingLatest($params = [])
    {
        return $this->get('trending/latest', $params);
    }

    /**
     * @param array $params ["start", "limit", "time_period", "convert", "convert_id" ]
     * @return mixed
     * @throws \Exception
     */
    public function mostVisited($params = [])
    {
        return $this->get('trending/most-visited', $params);
    }

    /**
     * @param array $params ["start", "limit", "time_period", "convert", "convert_id", "sort", "sort_dir"]
     * @return mixed
     * @throws \Exception
     */
    public function gainersLosers($params = [])
    {
        return $this->get('trending/gainers-losers', $params);
    }
}
