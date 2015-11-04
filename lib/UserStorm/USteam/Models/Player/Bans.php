<?php
/**
 * Player Bans Model
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

    /**
     * Number of VAC bans
     * @var int
     */
    private $numberOfVACBans;

    /**
     * Days since last ban
     * @var int
     */
    private $daysSinceLastBan;

    /**
     * Economy ban ?
     * @var string
     */
    private $economyBan;

    /**
     * Constructor
     * @param array $bans
     */
    public function __construct($bans = array())
    {
        if (!empty($bans)) {
            $reflect = new \ReflectionClass($this);
            $props = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);
            foreach ($props as $prop) {
                $propName = ucfirst($prop->getName());
                if (array_key_exists($propName, $bans)) {
                    $setter = 'set' . $propName;
                    $this->$setter($bans[$propName]);
                }
            }
        }
    }

    /**
     * @return int
     */
    public function getSteamId()
    {
        return $this->steamId;
    }

    /**
     * @param int $steamId
     */
    public function setSteamId($steamId)
    {
        $this->steamId = $steamId;
    }

    /**
     * @return boolean
     */
    public function isCommunityBanned()
    {
        return $this->communityBanned;
    }

    /**
     * @param boolean $communityBanned
     */
    public function setCommunityBanned($communityBanned)
    {
        $this->communityBanned = $communityBanned;
    }

    /**
     * @return boolean
     */
    public function isVACBanned()
    {
        return $this->VACBanned;
    }

    /**
     * @param boolean $VACBanned
     */
    public function setVACBanned($VACBanned)
    {
        $this->VACBanned = $VACBanned;
    }

    /**
     * @return int
     */
    public function getNumberOfVACBans()
    {
        return $this->numberOfVACBans;
    }

    /**
     * @param int $numberOfVACBans
     */
    public function setNumberOfVACBans($numberOfVACBans)
    {
        $this->numberOfVACBans = $numberOfVACBans;
    }

    /**
     * @return int
     */
    public function getDaysSinceLastBan()
    {
        return $this->daysSinceLastBan;
    }

    /**
     * @param int $daysSinceLastBan
     */
    public function setDaysSinceLastBan($daysSinceLastBan)
    {
        $this->daysSinceLastBan = $daysSinceLastBan;
    }

    /**
     * @return string
     */
    public function getEconomyBan()
    {
        return $this->economyBan;
    }

    /**
     * @param string $economyBan
     */
    public function setEconomyBan($economyBan)
    {
        $this->economyBan = $economyBan;
    }
}