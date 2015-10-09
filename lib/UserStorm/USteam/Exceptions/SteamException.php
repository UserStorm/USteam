<?php
/**
 * Exception from Steam API
 *
 * @author Sebastian Nagels <snagels@userstorm.com>
 */

namespace UserStorm\USteam\Exceptions;

class SteamException extends \Exception
{
    /**
     * @var int
     */
    protected $statusCode;

    /**
     * @var string
     */
    protected $statusMessage;

    public function __construct($statusCode, $statusMessage, $exception = null)
    {
        $this->statusCode = $statusCode;
        $this->statusMessage = $statusMessage;

        parent::__construct($statusMessage, $statusCode, $exception);
    }
}