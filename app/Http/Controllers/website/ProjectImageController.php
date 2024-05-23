<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\AddProjectImageRequest;
use App\Http\Requests\Project\EditProjectImageRequest;
use App\Http\Resources\dashboard\ProjectImageResource;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{
    public function __construct(private ProjectImageService $service) {}

    public function index()
{
    $data = $this->service->getAll();
    $resource  = ProjectImageResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}
}
