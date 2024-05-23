<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service\AddServiceRequest;
use App\Http\Requests\Service\EditServiceRequest;
use App\Http\Resources\dashboard\ServiceResource;
use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{


    public function __construct(private ServiceService $service) {}
    public function index(){

        $data = $this->service->getAll();
        $resorse = ServiceResource::collection($data);
        return $this->sendResponse("get_data_succsussfuly",["data"=>$resorse]);

    }
    public function show($id){
        $data = $this->service->getOne($id);
        $resorse = new ServiceResource($data);
        return $this->sendResponse("get_data_succsussfuly",["data"=>$resorse]);

    }


    public function create(AddServiceRequest $request ){
        $validatedData = $request->validated();
        $this->service->create($validatedData);
        return $this->sendResponse("added_succsussfuly");


    }
    public function update($id,EditServiceRequest $request){
        $validatedData = $request->validated();
        $this->service->update($id,$validatedData) ;
        return $this->sendResponse("updated_succsussfuly");


    }
    public function destroy($id){
        $this->service->delete_with_image($id,"image");
        return $this->sendResponse("delete_succsussfuly");

    }


}
