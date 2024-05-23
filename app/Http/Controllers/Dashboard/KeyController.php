<?php

namespace App\Http\Controllers\Dashboard;

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
        $resource = KeyResource::collection($data);
        return $this->sendResponse("get_data_successfully", ["data" => $resource]);
    }
public function show ($id){
    $data = $this->service->getOne($id);
    $resource = new KeyResource($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}



    public function create(AddKeyRequest $request){
        $validatedData = $request->validated();
        $this->service->create($validatedData) ;

    return $this->sendResponse("added_sucssefully");

    }
    public function update($id,EditKeyRequest $request){
        $validatedData = $request->validated();
        $this->service->update($id,$validatedData) ;
        return $this->sendResponse("updated_sucssefully");

        }

        public function destroy($id){
             $this->service->destroy($id);
            return $this->sendResponse("deleted_sucssefully");

        }
}
