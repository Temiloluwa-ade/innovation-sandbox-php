<?php

require_once './tests/Fixtures/Sterling.php';

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Psr7\Response;
use InnovationSandbox\Sterling\Account;
use GuzzleHttp\Middleware;

class AccountTest extends TestCase{

    private $mockHandler, 
            $apiClient,
            $base_uri,
            $faker,
            $fixture;
    
    public function setUp(){
        parent::setUp();
        $this->faker = Faker\Factory::create();
        $this->base_url = $this->faker->freeEmailDomain();
        $this->mockHandler = new MockHandler();
        $httpClient = new Client([
            'handler' => $this->mockHandler,
            'base_uri' => $this->base_uri
        ]);
        $this->apiClient = new Account($httpClient);
        $this->fixture = new Sterling();
    }

    public function testShouldVerifyTransfer(){
        $bvnData = $this->fixture->interbankRequest();
        $this->mockHandler->append(new Response(
            200, 
            [], 
            json_encode($this->fixture->interbankResponse()
        )));

        $result = json_decode($this->apiClient->InterbankTransferReq($bvnData));
        $this->assertObjectHasAttribute('message', $result);
        $this->assertObjectHasAttribute('data', $result);
        $this->assertEquals('OK', $result->message);
        $this->assertEquals('00', $result->data->data->status);
    }

}