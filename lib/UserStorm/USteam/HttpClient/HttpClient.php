<?php
/**
 * Basic Http Client based on guzzle
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\HttpClient;

use GuzzleHttp\Client;

class HttpClient extends Client
{
    const METHOD_POST = 'POST';
    const METHOD_GET  = 'GET';
}