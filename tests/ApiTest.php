<?php

use CoinMarketCap\Api;
use PHPUnit\Framework\TestCase;

require_once('../vendor/autoload.php');

class ApiTest extends TestCase
{
    private $apiKey;

    public function setUp() : void
    {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__  . '/../');
        $dotenv->load();
        $this->apiKey = $_ENV['API_KEY'];
    }

    public function tearDown() : void
    {
        $this->apiKey = null;
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
        $api = new Api($this->apiKey);
        $result = get_object_vars($api->tools()->priceConversion(['amount' => 1, 'symbol' => 'BTC']));

        $this->assertArrayHasKey('status', $result);
    }

    public function testCases()
    {
        return [
            [''],
            ['test'],
            [123]
        ];
    }
}
