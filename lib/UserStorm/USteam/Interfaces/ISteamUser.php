<?php
/**
 * ISteamUser
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\Interfaces;

use UserStorm\USteam\Models\User\SteamPlayer;

/**
 * Interface ISteamUser
 * @package UserStorm\USteam\Interfaces
 */
interface ISteamUser
{
    public function GetPlayerBans();

    /**
     * Request steam players with its Steam ID
     *
     * @param string $steamId
     *
     * @return SteamPlayer User Summary Data
     */
    public function GetPlayerSummaries($steamId);

    public function GetFriendList();
    public function GetUserGroupList();
    public function ResolveVanityURL($vanityUrl);
}