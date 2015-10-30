<?php
/**
 * SteamClient
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam;
use GuzzleHttp\Client;
use UserStorm\USteam\HttpClient\HttpClient;
use UserStorm\USteam\Models\Player\SteamPlayer;

/**
 * Steam Client
 *
 * Class SteamClient
 * @package UserStorm\USteam
 */
abstract class SteamClient
{
    /**
     * @var string
     */
    protected $baseUrl = "http://api.steampowered.com/";

    /**
     * @var string
     */
    protected $interface;

    /**
     * @var string
     */
    protected $method;

    /**
     * @var int
     */
    protected $version;

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

    private function generateUri()
    {
        $url = $this->baseUrl;
        if ($this->interface) {
            $url .= $this->interface . '/';
        }

        if ($this->method) {
            $url .= $this->method . '/';
        }

        if ($this->version) {
            $url .= 'v' . $this->version . '/';
        }

        return $url;
    }

    /**
     * Returns the requests raw response
     *
     * @param string $arguments
     *
     * @return string
     */
    protected function request($arguments = null)
    {
        $parameters = array(
            'key' => $this->apiKey
        );

        if (!empty($arguments)) {
            $parameters = array_merge($parameters, $arguments);
        }

        $url = $this->generateUri() . '?' . http_build_query($parameters);

        $response = $this->httpClient->request(HttpClient::METHOD_GET, $url);

        return $response;
    }
}