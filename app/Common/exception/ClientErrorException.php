<?php

namespace App\Common\exception;

class ClientErrorException extends \Exception
{
    public function __construct(protected $message = '', protected $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
