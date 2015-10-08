<?php
/**
 * SteamClient
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam;
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
     * client ready to perform requests?
     *
     * @var bool
     */
    private $isInitialized;

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
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;

        $this->httpClient = new HttpClient();
    }

    /**
     * Check if the client is ready to perform requests
     *
     * @return bool
     */
    public function isInitialized()
    {
        $this->checkInitialization();

        return $this->isInitialized;
    }

    /**
     * Check if client is initialized
     */
    private function checkInitialization()
    {
        $initialized = true;

        if (empty($this->apiKey)) {
            $initialized = false;
        }

        $this->isInitialized = $initialized;
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

        /** @var Response $request */
        $response = $this->httpClient->get($url);

        return $response->getBody()->__toString();
    }

    /**
     * Request steam players with its Steam ID
     *
     * @param array $steamIds
     *
     * @return array
     */
    public function requestPlayer($steamIds)
    {
        $url = $this->steamBaseUrl . str_replace("{steamIds}", $steamIds, $this->urlGetPlayerSummaries);

        $response = $this->request($url);

        $players = json_decode($response)["response"]["players"];

        $playerModels = array();
        foreach ($players as $player) {
            $tmpPlayer = new SteamPlayer($player);

            $playerModels[] = $tmpPlayer;
        }

        var_dump($playerModels);

        return $playerModels;
    }
}