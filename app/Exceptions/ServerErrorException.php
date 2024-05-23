<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class ServerErrorException extends Exception
{
    public function __construct($message = "Internal Server Error", $code = 500, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
    public function response(): JsonResponse
    {
        return response()->json([
            "message" => $this->message,
            "success" => false
        ], $this->code);
    }
}
