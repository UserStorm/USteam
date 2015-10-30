<?php
/**
 * SteamPlayer Model
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\Models;

use DateTime;

/**
 * Class SteamPlayer
 * @package UserStorm\USteam\Models\User
 */
class SteamPlayer
{
    static $personaStates = array(
        0 => "Offline",
        1 => "Online",
        2 => "Busy",
        3 => "Away",
        4 => "Snooze",
        5 => "Looking to trade",
        6 => "Looking to Play"
    );

    /**
     * @var int
     */
    private $steamid;

    /**
     * @var int
     */
    private $communityvisibilitystate;

    /**
     * @var int
     */
    private $profilestate;

    /**
     * @var string
     */
    private $personaname;

    /**
     * @var DateTime
     */
    private $lastlogoff;

    /**
     * @var string
     */
    private $profileurl;

    /**
     * @var string
     */
    private $avatar;

    /**
     * @var string
     */
    private $avatarmedium;

    /**
     * @var string
     */
    private $avatarfull;

    /**
     * @var int
     */
    private $personastate;

    /**
     * @var string
     */
    private $realname;

    /**
     * @var int
     */
    private $primaryclanid;

    /**
     * @var DateTime
     */
    private $timecreated;

    /**
     * @var int
     */
    private $personastateflags;

    /**
     * @var string
     */
    private $loccountrycode;

    /**
     * @var string
     */
    private $locstatecode;

    /**
     * @var int
     */
    private $loccityid;

    /**
     * Constructor
     *
     * @param array $player
     */
    public function __construct($player = array())
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

    /**
     * @return int
     */
    public function getSteamid()
    {
        return $this->steamid;
    }

    /**
     * @param int $steamid
     */
    public function setSteamid($steamid)
    {
        $this->steamid = $steamid;
    }

    /**
     * @return int
     */
    public function getCommunityvisibilitystate()
    {
        return $this->communityvisibilitystate;
    }

    /**
     * @param int $communityvisibilitystate
     */
    public function setCommunityvisibilitystate($communityvisibilitystate)
    {
        $this->communityvisibilitystate = $communityvisibilitystate;
    }

    /**
     * @return int
     */
    public function getProfilestate()
    {
        return $this->profilestate;
    }

    /**
     * @param int $profilestate
     */
    public function setProfilestate($profilestate)
    {
        $this->profilestate = $profilestate;
    }

    /**
     * @return string
     */
    public function getPersonaname()
    {
        return $this->personaname;
    }

    /**
     * @param string $personaname
     */
    public function setPersonaname($personaname)
    {
        $this->personaname = $personaname;
    }

    /**
     * @return DateTime
     */
    public function getLastlogoff()
    {
        return $this->lastlogoff;
    }

    /**
     * @param int $lastlogoff
     */
    public function setLastlogoff($lastlogoff)
    {
        $this->lastlogoff = new \DateTime();
        $this->lastlogoff->setTimestamp($lastlogoff);
    }

    /**
     * @return string
     */
    public function getProfileurl()
    {
        return $this->profileurl;
    }

    /**
     * @param string $profileurl
     */
    public function setProfileurl($profileurl)
    {
        $this->profileurl = $profileurl;
    }

    /**
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string
     */
    public function getAvatarmedium()
    {
        return $this->avatarmedium;
    }

    /**
     * @param string $avatarmedium
     */
    public function setAvatarmedium($avatarmedium)
    {
        $this->avatarmedium = $avatarmedium;
    }

    /**
     * @return string
     */
    public function getAvatarfull()
    {
        return $this->avatarfull;
    }

    /**
     * @param string $avatarfull
     */
    public function setAvatarfull($avatarfull)
    {
        $this->avatarfull = $avatarfull;
    }

    /**
     * @param bool $raw False will present the the associated String
     * @return int
     */
    public function getPersonastate($raw = false)
    {
        if ($raw) {
            return $this->personastate;
        }

        return self::$personaStates[$this->personastate];
    }

    /**
     * @param int $personastate
     */
    public function setPersonastate($personastate)
    {
        $this->personastate = $personastate;
    }

    /**
     * @return string
     */
    public function getRealname()
    {
        return $this->realname;
    }

    /**
     * @param string $realname
     */
    public function setRealname($realname)
    {
        $this->realname = $realname;
    }

    /**
     * @return int
     */
    public function getPrimaryclanid()
    {
        return $this->primaryclanid;
    }

    /**
     * @param int $primaryclanid
     */
    public function setPrimaryclanid($primaryclanid)
    {
        $this->primaryclanid = $primaryclanid;
    }

    /**
     * @return DateTime
     */
    public function getTimecreated()
    {
        return $this->timecreated;
    }

    /**
     * @param int $timecreated
     */
    public function setTimecreated($timecreated)
    {
        $this->timecreated = new \DateTime();
        $this->timecreated->setTimestamp($timecreated);
    }

    /**
     * @return int
     */
    public function getPersonastateflags()
    {
        return $this->personastateflags;
    }

    /**
     * @param int $personastateflags
     */
    public function setPersonastateflags($personastateflags)
    {
        $this->personastateflags = $personastateflags;
    }

    /**
     * @return string
     */
    public function getLoccountrycode()
    {
        return $this->loccountrycode;
    }

    /**
     * @param string $loccountrycode
     */
    public function setLoccountrycode($loccountrycode)
    {
        $this->loccountrycode = $loccountrycode;
    }

    /**
     * @return string
     */
    public function getLocstatecode()
    {
        return $this->locstatecode;
    }

    /**
     * @param string $locstatecode
     */
    public function setLocstatecode($locstatecode)
    {
        $this->locstatecode = $locstatecode;
    }

    /**
     * @return int
     */
    public function getLoccityid()
    {
        return $this->loccityid;
    }

    /**
     * @param int $loccityid
     */
    public function setLoccityid($loccityid)
    {
        $this->loccityid = $loccityid;
    }
}