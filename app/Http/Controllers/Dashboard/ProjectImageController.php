<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\AddProjectImageRequest;
use App\Http\Requests\Project\EditProjectImageRequest;
use App\Http\Resources\dashboard\ProjectImageResource;
use App\Services\ProjectImageService;
use Illuminate\Http\Request;

class ProjectImageController extends Controller
{
    public function __construct(private ProjectImageService $service) {}

    public function index(Request $request)
{
    $data = $this->service->getallWithfillter($request);
    $resource  = ProjectImageResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}
public function show ($id){
    $data = $this->service->getOne($id);
    $resource = new ProjectImageResource($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}



    public function create(AddProjectImageRequest $request){
        $validatedData = $request->validated();
        $this->service->create($validatedData) ;

    return $this->sendResponse("added_sucssefully");

    }
    public function update($id,EditProjectImageRequest $request){
        $validatedData = $request->validated();
        $this->service->update($id,$validatedData) ;
        return $this->sendResponse("updated_sucssefully");

        }

        public function destroy($id){
          $this->service->delete_with_image($id,"logo");
            return $this->sendResponse("delete_succsussfuly");
        }
}
