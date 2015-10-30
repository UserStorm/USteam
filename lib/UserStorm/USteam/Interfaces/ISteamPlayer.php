<?php
/**
 * ISteamPlayer
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\Interfaces;

/**
 * Interface ISteamPlayer
 * @package UserStorm\USteam\Interfaces
 */
interface ISteamPlayer
{
    public function GetSteamLevel();

    public function GetPlayerLevelDetails();

    public function GetBadges();

    public function GetCommunityBadgeProgress();

    public function GetOwnedGames();

    public function GetRecentlyPlayedGames();

    public function IsPlayingSharedGame($appId);
}