<?php

namespace UserStorm\Tests;
use UserStorm\USteam\Models\Player\SteamPlayer;

/**
 * Base testcase class for all UserStorm testcases
 *
 * Class UserstormTestCase
 * @package UserStorm\Tests
 */
abstract class UserStormTestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * Create defaule SteamPlayer Model for testing
     *
     * @return SteamPlayer
     */
    protected function createDefaultSteamPlayer()
    {
        $player = new SteamPlayer();
        $player->setSteamid(76561197960435530);
        $player->setCommunityvisibilitystate(3);
        $player->setProfilestate(1);
        $player->setLastlogoff(1444301399);
        $player->setProfileurl("http://steamcommunity.com/id/robinwalker/");
        $player->setAvatar("https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/f1/f1dd60a188883caf82d0cbfccfe6aba0af1732d4.jpg");
        $player->setAvatarmedium("https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/f1/f1dd60a188883caf82d0cbfccfe6aba0af1732d4_medium.jpg");
        $player->setAvatarfull("https://steamcdn-a.akamaihd.net/steamcommunity/public/images/avatars/f1/f1dd60a188883caf82d0cbfccfe6aba0af1732d4_full.jpg");
        $player->setPersonastate(0);
        $player->setRealname("Robin Walker");
        $player->setPrimaryclanid(103582791429521412);
        $player->setTimecreated(1063407589);
        $player->setPersonastateflags(0);
        $player->setLoccountrycode("US");
        $player->setLocstatecode("WA");
        $player->setLoccityid(3961);

        return $player;
    }
}