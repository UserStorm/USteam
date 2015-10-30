<?php
/**
 * PlayerClient
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam;


use GuzzleHttp\Client;
use UserStorm\USteam\Interfaces\ISteamUser;
use UserStorm\USteam\Models\User\SteamPlayer;

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

    public function GetPlayerBans()
    {
        // TODO: Implement GetPlayerBans() method.
    }

    public function GetFriendList()
    {
        // TODO: Implement GetFriendList() method.
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