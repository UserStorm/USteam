<?php
/**
 * SteamPlayer Tests
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\Tests\USteam\Models\Player;


use UserStorm\Tests\UserStormTestCase;
use UserStorm\USteam\Models\SteamPlayer;

/**
 * Class SteamPlayerTest
 * Test behavior of SteamPlayer model
 * @package UserStorm\Tests\USteam\Models\Player
 */
class SteamPlayerTest extends UserStormTestCase
{
    /**
     * Test convertion of timestamp to DateTime object
     */
    public function testConvertTimestampToDateTime()
    {
        /** @var SteamPlayer $player */
        $player = $this->createDefaultSteamPlayer();

        $lasLogOff = new \DateTime();
        $lasLogOff->setTimestamp(1444359653);
        $this->assertEquals($lasLogOff, $player->getLastlogoff());

        $timeCreated = new \DateTime();
        $timeCreated->setTimestamp(1063407589);
        $this->assertEquals($timeCreated, $player->getTimecreated());
    }
}