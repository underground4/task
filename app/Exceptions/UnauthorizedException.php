<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

class UnauthorizedException extends AbstractHttpException
{
    public function __construct($message = "Unauthorized", $code = Response::HTTP_UNAUTHORIZED)
    {
        parent::__construct($code, $message);
    }
}
