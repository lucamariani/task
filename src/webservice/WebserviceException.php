<?php

/**
 * Class WebserviceException
 * This class defines WebService excpetions
 */
class WebserviceException extends Exception
{

    public function __construct(string $message = "", int $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}