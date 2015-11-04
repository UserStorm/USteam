<?php
/**
 * ISteamUser
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\Interfaces;

use UserStorm\USteam\Models\Player\Bans;
use UserStorm\USteam\Models\SteamPlayer;

/**
 * Interface ISteamUser
 * @package UserStorm\USteam\Interfaces
 */
interface ISteamUser
{
    /**
     * Request steam player bans with its Steam ID
     * @param string $steamId
     * @return Bans
     */
    public function GetPlayerBans($steamId);

    /**
     * Request steam players with its Steam ID
     * @param string $steamId
     * @return SteamPlayer User Summary Data
     */
    public function GetPlayerSummaries($steamId);

    /**
     * Request friend list of steam player
     * @param string    $steamId
     * @param string    $relationship
     * @return FriendList Users friend list
     */
    public function GetFriendList($steamId, $relationship = "all");

    public function GetUserGroupList();
    public function ResolveVanityURL($vanityUrl);
}