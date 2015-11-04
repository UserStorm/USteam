<?php
/**
 * SteamPlayer's friend Model
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\Models\Player\FriendList;

/**
 * Class Friend
 * @package UserStorm\USteam\Models\Player\FriendList
 */
class Friend
{
    /**
     * Steam ID
     * @var int
     */
    private $steamid;

    /**
     * Type of relationship
     * @var string
     */
    private $relationship;

    /**
     * Date on which the players befriended each other
     * @var \DateTime
     */
    private $friendSince;

    /**
     * Constructor
     * @param array $friend
     */
    public function __construct($friend = array())
    {
        if (!empty($friend)) {
            $reflect = new \ReflectionClass($this);
            $props = $reflect->getProperties(\ReflectionProperty::IS_PRIVATE);
            foreach ($props as $prop) {
                $propName = ucfirst($prop->getName());
                if (array_key_exists($propName, $friend)) {
                    $setter = 'set' . $propName;
                    $this->$setter($friend[$propName]);
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
     * @return string
     */
    public function getRelationship()
    {
        return $this->relationship;
    }

    /**
     * @param string $relationship
     */
    public function setRelationship($relationship)
    {
        $this->relationship = $relationship;
    }

    /**
     * @return \DateTime
     */
    public function getFriendSince()
    {
        return $this->friendSince;
    }

    /**
     * @param int $friendSince
     */
    public function setFriendSince($friendSince)
    {
        $this->friendSince = new \DateTime();
        $this->friendSince->setTimestamp($friendSince);
    }
}