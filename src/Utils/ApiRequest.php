<?php

namespace CoinMarketCap\Utils;

use Unirest;
abstract class ApiRequest
{
    protected static string $apiPath = "https://pro-api.coinmarketcap.com/v1/";
    private static array $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ];

    /**
     * ApiRequest constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey)
    {
        self::$headers['X-CMC_PRO_API_KEY'] = $apiKey;
    }

    /**
     * @param string $endpoint
     * @param array $parameters
     * @return mixed
     * @throws \Exception
     */
    protected function get(string $endpoint, array $parameters = [])
    {
        $apiCall = self::$apiPath . $endpoint;
        $response = Unirest\Request::get($apiCall, self::$headers, $parameters);

        if ($response->code == 200) {
            return $response->body;
        } else {
            throw new \Exception($response->body->status->error_message, $response->body->status->error_code);
        }
    }
}
