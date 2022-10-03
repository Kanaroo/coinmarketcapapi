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

    function test_api_is_available()
    {
        $this->manualSetUp();
        try {
            $this->api->fiat()->map(['limit' => 3]);
        } catch (\Exception $e) {
            $this->assertEquals($e->getCode(), 500);
            $this->fail('API not available');
        }
        $this->assertTrue(true);
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

    function test_it_throws_exception_for_wrong_numeric_id()
    {
        $this->manualSetUp();

        try {
            $this->api->cryptocurrency()->info(['id' => 1920319231923]);
        } catch (\Exception $e) {
            $this->assertEquals($e->getMessage(), 'Invalid value for "id": "1920319231923"');
            $this->assertEquals($e->getCode(), 400);
        }
    }

    /**
     * @throws Exception
     */
    function test_it_throws_exception_for_wrong_string_id()
    {
        $this->manualSetUp();
        $this->expectExceptionMessage('"id" should only include comma-separated numeric CoinMarketCap cryptocurrency ids');

        $this->api->cryptocurrency()->info(['id' => 'asdasd123']);
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
