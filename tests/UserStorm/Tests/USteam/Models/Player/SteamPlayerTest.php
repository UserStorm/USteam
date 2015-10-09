<?php
/**
 * SteamPlayer Tests
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\Tests\USteam\Models\Player;


use UserStorm\Tests\UserStormTestCase;
use UserStorm\USteam\Models\Player\SteamPlayer;

class SteamPlayerTest extends UserStormTestCase
{
    public function testConvertTimestampToDateTime()
    {
        /** @var SteamPlayer $player */
        $player = $this->createDefaultSteamPlayer()[0];

        $lasLogOff = new \DateTime();
        $lasLogOff->setTimestamp(1444359653);
        $this->assertEquals($lasLogOff, $player->getLastlogoff());

        $timeCreated = new \DateTime();
        $timeCreated->setTimestamp(1063407589);
        $this->assertEquals($timeCreated, $player->getTimecreated());
    }
}