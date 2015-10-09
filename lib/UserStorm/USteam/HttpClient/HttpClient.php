<?php
/**
 * Basic Http Client based on guzzle
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\HttpClient;

use GuzzleHttp\Client;
use UserStorm\USteam\Exceptions\SteamException;

class HttpClient extends Client
{
    const METHOD_POST = 'POST';
    const METHOD_GET  = 'GET';

    /**
     * {@inheritDoc}
     */
    public function request($method, $uri, array $options = [])
    {
        try {
            $response = parent::request($method, $uri);
        } catch (\Exception $ex) {
            throw $this->createHttpClientException(0, "", $ex);
        }

        if (200 != intval($response->getStatusCode())) {
            throw $this->createHttpClientException($response->getStatusCode(), $response->getReasonPhrase());
        }

        return $response->getBody()->__toString();
    }

    /**
     * @param int       $statusCode
     * @param string    $statusMessage
     * @param null      $exception
     *
     * @return SteamException
     */
    protected function createHttpClientException($statusCode, $statusMessage, $exception = null)
    {
        $httpClientException = new SteamException($statusCode, $statusMessage, $exception);

        return $httpClientException;
    }
}