<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Key\AddKeyRequest;
use App\Http\Requests\Key\EditKeyRequest;
use App\Http\Resources\dashboard\KeyResource;
use App\Services\KeyService;
use Illuminate\Http\Request;

class KeyController extends Controller
{
    public function __construct(private KeyService $service) {}
    public function index(Request $request)
    {
    $data = $this->service->getallWithfillter($request);
    $resource  = KeyResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}
}
