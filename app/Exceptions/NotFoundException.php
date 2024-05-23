<?php
namespace App\Exceptions;

use Exception;
use GuzzleHttp\Psr7\Response;

class NotFoundException extends Exception {
    // Custom message for the exception
    public function __construct($message = "Resource not found", $code = 404, Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
    public function response(){
        return response()->json([
            "message" => $this->message,
            "success" => false

        ],$this->code);
    }
}
