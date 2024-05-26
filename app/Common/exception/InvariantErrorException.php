<?php

namespace App\Common\exception;

class InvariantErrorException extends ClientErrorException
{
    public function __construct(protected $message = '', protected $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
