<?php

namespace CoinMarketCap\Utils;

use Unirest;
abstract class ApiRequest
{
    protected string $apiPath;
    private array $headers = [
        'Accept' => 'application/json',
        'Content-Type' => 'application/json'
    ];

    /**
     * ApiRequest constructor.
     * @param string $apiKey
     */
    public function __construct(string $apiKey, string $path)
    {
        $this->headers['X-CMC_PRO_API_KEY'] = $apiKey;
        $this->apiPath = "https://pro-api.coinmarketcap.com/v1/" . $path;
    }

    /**
     * @param string $endpoint
     * @param array $parameters
     * @return mixed
     * @throws \Exception
     */
    protected function get(string $endpoint, array $parameters = [])
    {
        $apiCall = $this->apiPath . $endpoint;
        Unirest\Request::verifyPeer(false);
        $response = Unirest\Request::get($apiCall, $this->headers, $parameters);

        if ($response->code == 200) {
            return $response->body;
        } else {
            throw new \Exception($response->body->status->error_message, $response->body->status->error_code);
        }
    }
}
