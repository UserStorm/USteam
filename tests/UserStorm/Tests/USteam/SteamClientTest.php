<?php
/**
 * SteamClient Tests
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\Tests\USteam;

use UserStorm\Tests\UserStormTestCase;
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
    }

    public function testInitClient()
    {
        $this->assertTrue($this->client->isInitialized());
    }
}