<?php
/**
 * SteamClient Tests
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam;

/**
 * Steam Client
 *
 * Class SteamClient
 * @package UserStorm\USteam
 */
class SteamClient
{
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
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * Check if the client is ready to perform requests
     *
     * @return bool
     */
    public function isInitialized()
    {
        return $this->isInitialized;
    }
}