<?php

use CoinMarketCap\Api;
use PHPUnit\Framework\TestCase;

require_once('../vendor/autoload.php');

class ApiTest extends TestCase
{
    private $api;

    public function manualSetUp() : void
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__  . '/../');
        $dotenv->load();
        $apiKey = $_ENV['API_KEY'];
        $this->api = new Api($apiKey);
    }

    /**
     * @dataProvider testCases
     */
    function test_it_throws_exception_for_test_cases($case)
    {
        $this->expectException(\Exception::class);

        $api = new Api($case);
        $api->cryptocurrency()->map(['limit' => 3]);
    }

    /**
     * @throws Exception
     */
    function test_it_returns_some_data_with_correct_api_key()
    {
        $this->manualSetUp();
        $result = get_object_vars($this->api->cryptocurrency()->map(['limit' => 3]));

        $this->assertArrayHasKey('status', $result);
    }

    /**
     * @throws Exception
     */
    function test_it_throws_exception_for_trending_endpoint_with_basic_plan_key()
    {
        $this->manualSetUp();
        $this->expectExceptionMessage("Your API Key subscription plan doesn't support this endpoint.");

        $this->api->cryptocurrency()->trendingLatest(['limit' => 3]);
    }

    public function testCases()
    {
        $this->expectNotToPerformAssertions();
        return [
            [''],
            ['test'],
            [123]
        ];
    }
}
