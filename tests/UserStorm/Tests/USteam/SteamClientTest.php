<?php
/**
 * SteamClient Tests
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\Tests\USteam;

use UserStorm\Tests\UserStormTestCase;
use UserStorm\USteam\Models\Player\SteamPlayer;
use UserStorm\USteam\SteamClient;

class SteamClientTest extends UserStormTestCase
{
    /**
     * @var SteamClient
     */
    private $client;

    protected function setUp()
    {
        $this->client = new SteamClient("I-AM-AN-APY-KEY-123456");
        $this->client = new SteamClient("801BCE6199999BDAC62E6EFF29C4504A");
    }

    public function testInitClient()
    {
        $this->assertTrue($this->client->isInitialized(), "Client is not initialized but it should be");
    }

    public function testCanRequestUser()
    {
        $player = $this->createDefaultSteamPlayer();

        $this->assertEquals($player, $this->client->requestPlayer(76561197960435530), "Requested Player information is not accurate");
    }
}