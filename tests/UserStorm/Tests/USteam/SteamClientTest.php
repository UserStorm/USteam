<?php
/**
 * SteamClient Tests
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\Tests\USteam;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use UserStorm\Tests\UserStormTestCase;
use UserStorm\USteam\HttpClient\HttpClient;
use UserStorm\USteam\SteamClient;

class SteamClientTest extends UserStormTestCase
{
    const API_KEY = "I-AM-AN-APY-KEY-123456";

    /**
     * @var SteamClient
     */
    private $client;


    public function testCanRequestPlayer()
    {
        $player = $this->createDefaultSteamPlayer();

        $mock = new MockHandler([
            new Response(200, array(), file_get_contents(dirname(__DIR__) . "/RawResponses/player_200_response.txt")),
        ]);
        $this->setUpClient($mock);

        $this->assertEquals($player, $this->client->requestPlayer(array(76561197960435530)), "Requested Player information is not accurate");
    }

    /**
     * @expectedException \UserStorm\USteam\Exceptions\SteamException
     */
    public function testCannotRequestPlayer()
    {
        $mock = new MockHandler([
            new Response(403, array(), file_get_contents(dirname(__DIR__) . "/RawResponses/player_403_response.txt"))
        ]);
        $this->setUpClient($mock);

        $this->client->requestPlayer(array(76561197960435530));
    }

    private function setUpClient(MockHandler $mock = null)
    {
        $client = null;
        if (!is_null($mock)) {
            $handler = HandlerStack::create($mock);
            $client = new HttpClient(['handler' => $handler]);
        }

        $this->client = new SteamClient(self::API_KEY, $client);
    }
}