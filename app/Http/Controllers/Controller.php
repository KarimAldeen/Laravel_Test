<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaginationResource;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function sendResponse($message, $data = [], $status = 200)

    {

        return  response()->json([
            'message' => $message,
            "data" => $data,
            "success" => true

        ], $status);
    }

    public function sendError($message, $status = 400)
    {

        return  response()->json([
            'message' => $message,
            "data" => [],
            "success" => false

        ], $status);
    }




}
