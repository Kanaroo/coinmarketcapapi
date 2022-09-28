<?php

use CoinMarketCap\Api;
use PHPUnit\Framework\TestCase;

class ApiTest extends TestCase
{
    private $apiKey;

    public function setUp() : void
    {
        // Env not coming((
        $this->apiKey = getenv('API_KEY');
    }

    public function tearDown() : void
    {
        $this->apiKey = null;
    }

    /**
     * @test
     * @dataProvider testCases
     */
    function it_throws_exception_for_test_cases($case)
    {
        $this->expectException(\Exception::class);

        $api = new Api($case);
        $api->cryptocurrency()->map(['limit' => 3]);
    }

    /**
     * @test
     */
    function it_returns_some_id_with_correct_api_key()
    {
        $api = new Api($this->apiKey);
        $result = $api->cryptocurrency()->map(['limit' => 3]);

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
