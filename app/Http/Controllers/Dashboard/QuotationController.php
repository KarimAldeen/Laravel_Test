<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quotation\AddQuotationRequest;
use App\Http\Requests\Quotation\EditQuotationRequest;
use App\Http\Resources\dashboard\QuotationResource;
use App\Services\QuotationService;

class QuotationController extends Controller
{
    public function __construct(private QuotationService $service) {}

    public function index()
{
    $data = $this->service->getAll();
    $resource  = QuotationResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}
public function show ($id){
    $data = $this->service->getOne($id);
    $resource = new QuotationResource($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}



    public function create(AddQuotationRequest $request){
        $validatedData = $request->validated();
        $this->service->create($validatedData) ;

    return $this->sendResponse("added_sucssefully");

    }
    public function update($id,EditQuotationRequest $request){
        $validatedData = $request->validated();
        $this->service->update($id,$validatedData) ;
        return $this->sendResponse("updated_sucssefully");

        }

        public function destroy($id){
           $this->service->delete_with_image($id,"attachment");
            return $this->sendResponse("delete_succsussfuly");

        }
}
