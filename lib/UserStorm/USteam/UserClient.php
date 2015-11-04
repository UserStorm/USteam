<?php
/**
 * PlayerClient
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam;


use GuzzleHttp\Client;
use UserStorm\USteam\Interfaces\ISteamUser;
use UserStorm\USteam\Models\Player\Bans;
use UserStorm\USteam\Models\Player\FriendList;
use UserStorm\USteam\Models\SteamPlayer;

/**
 * Class UserClient
 * Requesting Steam user data
 * @package UserStorm\USteam
 */
class UserClient extends SteamClient implements ISteamUser
{
    /**
     * Constructor
     * @param string        $apiKey
     * @param Client|null   $httpClient
     */
    public function __construct($apiKey, Client $httpClient = null)
    {
        parent::__construct($apiKey, $httpClient);

        $this->interface = "ISteamUser";
    }

    /**
     * {@inheritDoc}
     */
    public function GetPlayerSummaries($steamId)
    {
        $this->method   = __FUNCTION__;
        $this->version  = 2;

        $response = $this->request(array('steamids' => $steamId));
        $player = json_decode($response, true)["response"]["players"][0];

        return new SteamPlayer($player);
    }

    /**
     * {@inheritDoc}
     */
    public function GetPlayerBans($steamId)
    {
        $this->method   = __FUNCTION__;
        $this->version  = 1;

        $response = $this->request(array('steamids' => $steamId));
        $playerBans = json_decode($response, true)["players"][0];

        return new Bans($playerBans);
    }

    /**
     * {@inheritDoc}
     */
    public function GetFriendList($steamId, $relationship = "all")
    {
        $this->method   = __FUNCTION__;
        $this->version  = 1;

        $response = $this->request(array(
            'steamid'       => $steamId,
            'relationship'  => $relationship
        ));
        $friendList = json_decode($response, true)["friendlist"]["friends"];

        return new FriendList($friendList);
    }

    public function GetUserGroupList()
    {
        // TODO: Implement GetUserGroupList() method.
    }

    public function ResolveVanityURL($vanityUrl)
    {
        // TODO: Implement ResolveVanityURL() method.
    }
}