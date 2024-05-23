<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Developer\AddDeveloperRequest;
use App\Http\Requests\Developer\EditDeveloperRequest;
use App\Http\Resources\dashboard\DeveloperResource;
use App\Services\DeveloperService;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    public function __construct(private DeveloperService $service) {}

    public function index()
{
    $data = $this->service->getAll();
    $resource  = DeveloperResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}
public function show ($id){
    $data = $this->service->getOne($id);
    $resource = new DeveloperResource($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}



    public function create(AddDeveloperRequest $request){
        $validatedData = $request->validated();
        $this->service->create($validatedData) ;

    return $this->sendResponse("added_sucssefully");

    }
    public function update($id,EditDeveloperRequest $request){
        $validatedData = $request->validated();
          $this->service->update($id,$validatedData) ;
        return $this->sendResponse("added_sucssefully");

        }

        public function destroy($id){
            $this->service->delete_with_image($id,"image");
            return $this->sendResponse("delete_succsussfuly");
        }
}
