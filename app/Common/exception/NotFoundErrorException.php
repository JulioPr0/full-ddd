<?php

namespace App\Common\exception;

class NotFoundErrorException extends ClientErrorException
{
    public function __construct(protected $message = '', protected $code = 404, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
