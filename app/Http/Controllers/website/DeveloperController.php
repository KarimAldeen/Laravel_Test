<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Developer\AddDeveloperRequest;
use App\Http\Requests\Developer\EditDeveloperRequest;
use App\Http\Resources\dashboard\DeveloperResource;
use App\Services\DeveloperService;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function __construct(private DeveloperService $service)
    {
    }

    public function index()
    {
        $data = $this->service->getAll();
        $resource  = DeveloperResource::collection($data);
        return $this->sendResponse("get_data_sucssefuly", ["data" => $resource]);
    }
}
