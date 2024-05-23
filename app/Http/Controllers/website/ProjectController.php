<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\AddProjectRequest;
use App\Http\Requests\Project\EditProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Http\Resources\website\WebProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(private ProjectService $service) {}

    public function index(Request $request)
{
    $data = $this->service->getAllWithRelations($request);

    $resource  = WebProjectResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}

}
