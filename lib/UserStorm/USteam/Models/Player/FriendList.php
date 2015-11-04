<?php
/**
 * SteamPlayer's friend list Model
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\Models\Player;

use UserStorm\USteam\Models\Player\FriendList\Friend;

/**
 * Class FriendList
 * @package UserStorm\USteam\Models\Player
 */
class FriendList
{
    /**
     * Friends array
     * @var array
     */
    private $friends;

    /**
     * Number of friends
     * @var int
     */
    private $count;

    /**
     * Constructor
     * @param array $friendList
     */
    public function __construct($friendList = array())
    {
        if (!empty($friendList)) {
            foreach ($friendList as $friend) {
                $this->friends[] = new Friend($friend);
            }
            $this->count = count($this->friends);
        }
    }

    /**
     * @return array
     */
    public function getFriends()
    {
        return $this->friends;
    }

    /**
     * @param array $friends
     */
    public function setFriends($friends)
    {
        $this->friends = $friends;
        $this->count = count($friends);
    }

    /**
     * @return int
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param int $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }
}