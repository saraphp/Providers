<?php


namespace App\Payments\Exceptions;


use Throwable;

class StatusNotFoundException extends \Exception
{
    public function __construct($message = "Status not found ", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
