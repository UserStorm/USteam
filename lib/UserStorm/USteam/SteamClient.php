<?php
/**
 * SteamClient
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use UserStorm\USteam\HttpClient\HttpClient;
use UserStorm\USteam\Models\Player\SteamPlayer;

/**
 * Steam Client
 *
 * Class SteamClient
 * @package UserStorm\USteam
 */
class SteamClient
{
    /**
     * @var string
     */
    private $steamBaseUrl = "http://api.steampowered.com/";

    /**
     * @var string
     */
    private $urlGetPlayerSummaries = "ISteamUser/GetPlayerSummaries/v0002/?steamids={steamIds}";

    /**
     * API Key for accessing the Steam API
     *
     * @var string
     */
    private $apiKey;

    /**
     * @var HttpClient
     */
    private $httpClient;

    /**
     * @param string $apiKey
     * @param Client $httpClient
     */
    public function __construct($apiKey, Client $httpClient = null)
    {
        $this->apiKey = $apiKey;

        if (is_null($httpClient)) {
            $this->httpClient = new HttpClient();
        } else {
            $this->httpClient = $httpClient;
        }
    }

    /**
     * Returns the requests raw response
     *
     * @param string $url
     *
     * @return string
     */
    private function request($url)
    {
        $url .= "&key=" . $this->apiKey;

        $response = $this->httpClient->request(HttpClient::METHOD_GET, $url);

        return $response;
    }

    /**
     * Request steam players with its Steam ID
     *
     * @param array $steamIds
     *
     * @return array
     */
    public function requestPlayer(array $steamIds)
    {
        $steamIds = implode(",", $steamIds);
        $url = $this->steamBaseUrl . str_replace("{steamIds}", $steamIds, $this->urlGetPlayerSummaries);

        $response = $this->request($url);

        $players = json_decode($response, true)["response"]["players"];

        $playerModels = array();
        foreach ($players as $player) {
            $tmpPlayer = new SteamPlayer($player);

            $playerModels[] = $tmpPlayer;
        }

        return $playerModels;
    }
}