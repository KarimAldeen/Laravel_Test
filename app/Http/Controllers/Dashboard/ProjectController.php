<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\AddProjectRequest;
use App\Http\Requests\Project\EditProjectRequest;
use App\Http\Resources\dashboard\ProjectResource;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct(private ProjectService $service) {}

    public function index(Request $request)
{
    $data = $this->service->getallWithfillter($request);
    $resource  = ProjectResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}
public function show ($id){
    $data = $this->service->getOne($id);
    $resource = new ProjectResource($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}



    public function create(AddProjectRequest $request){
        $validatedData = $request->validated();
        $this->service->create($validatedData) ;

    return $this->sendResponse("added_sucssefully");

    }
    public function update($id,EditProjectRequest $request){
        $validatedData = $request->validated();
        var_dump(count($validatedData));

        return ;

    //    $this->service->update($id,$validatedData) ;
        // return $this->sendResponse("updated_sucssefully");

        }

        public function destroy($id){
            $this->service->delete_with_image($id,"logo");
            return $this->sendResponse("delete_succsussfuly");
        }
}
