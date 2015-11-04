<?php
/**
 * UserClient Tests
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\Tests\USteam;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use UserStorm\Tests\UserStormTestCase;
use UserStorm\USteam\HttpClient\HttpClient;
use UserStorm\USteam\UserClient;

/**
 * Class UserClientTest
 * Test UserClient
 * @package UserStorm\Tests\USteam
 */
class UserClientTest extends UserStormTestCase
{
    const API_KEY = "I-AM-AN-APY-KEY-123456";

    /**
     * @var UserClient
     */
    private $client;

    /**
     * Test if UserClient can be instantiated without
     * injecting guzzle client.
     */
    public function testCanInstantiateWithoutClient()
    {
        $client = new UserClient(self::API_KEY);
        $this->assertTrue($client instanceof UserClient);
    }

    /**
     * Test player request
     */
    public function testCanRequestPlayer()
    {
        $player = $this->createDefaultSteamPlayer();

        $mock = new MockHandler([
            new Response(200, array(), file_get_contents(dirname(__DIR__) . "/RawResponses/player_200_response.txt")),
        ]);
        $this->setUpClient($mock);

        $this->assertEquals($player,
            $this->client->getPlayerSummaries(76561197960435530),
            "Testing player request"
        );
    }

    /**
     * Test player bans request
     */
    public function testCanRequestPlayerBans()
    {
        $playerBans = $this->createDefaultSteamPlayerBans();

        $mock = new MockHandler([
            new Response(200, array(), file_get_contents(dirname(__DIR__) . "/RawResponses/playerbans_200_response.txt")),
        ]);
        $this->setUpClient($mock);

        $this->assertEquals(
            $playerBans,
            $this->client->GetPlayerBans(76561197960435530),
            "Testing player bans request"
        );
    }

    public function testCanRequestFriendList()
    {
        // TODO: Create test
    }

    /**
     * Test client behavior if 403 error occurred
     * @expectedException \UserStorm\USteam\Exceptions\SteamException
     */
    public function testCannotRequestPlayerInformation()
    {
        $error = file_get_contents(dirname(__DIR__) . "/RawResponses/error_403_response.txt");
        $mock = new MockHandler([
            new Response(403, array(), $error)
        ]);
        $this->setUpClient($mock);

        $this->assertSame(
            $error,
            $this->client->getPlayerSummaries(76561197960435530),
            "Testing request if response is 403 error"
        );
    }

    /**
     * Setup the client
     * @param MockHandler|null $mock
     */
    private function setUpClient(MockHandler $mock = null)
    {
        $client = null;
        if (!is_null($mock)) {
            $handler = HandlerStack::create($mock);
            $client = new HttpClient(['handler' => $handler]);
        }

        $this->client = new UserClient(self::API_KEY, $client);
    }
}