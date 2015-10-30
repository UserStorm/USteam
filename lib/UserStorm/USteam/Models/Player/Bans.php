<?php
/**
 * Bans
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\Models\Player;

/**
 * Class Bans
 * @package UserStorm\USteam\Models\Player
 */
class Bans
{
    /**
     * Steam ID
     * @var int
     */
    private $steamId;

    /**
     * Community banned ?
     * @var bool
     */
    private $communityBanned;

    /**
     * Valve Anti Cheat banned ?
     * @var bool
     */
    private $VACBanned;

    private $numberOfVACBans;

    private $daysSinceLastBan;

    private $economyBan;

    /**
     * Constructor
     *
     * @param array $ban
     */
    public function __construct($ban = array())
    {
        if (!empty($player)) {
            $reflect = new \ReflectionClass($this);
            $props = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);
            foreach ($props as $prop) {
                if (array_key_exists($prop->getName(), $player)) {
                    $setter = 'set' . $prop->getName();
                    $this->$setter($player[$prop->getName()]);
                }
            }
        }
    }
}