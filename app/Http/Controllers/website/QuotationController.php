<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Quotation\AddQuotationRequest;
use App\Http\Requests\RequestQuotation\AddRequestQuotationRequest;
use App\Http\Requests\RequestQuotation\EditRequestQuotationRequest;
use App\Http\Resources\dashboard\QuotationResource;
use App\Services\QuotationService;
use Illuminate\Http\Request;

class QuotationController extends Controller
{
    public function __construct(private QuotationService $service) {}
    public function index()
    {
    $data = $this->service->getAll();
    $resource  = QuotationResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}
public function create(AddQuotationRequest $request){
    $validatedData = $request->validated();
    $this->service->create($validatedData) ;

return $this->sendResponse("added_sucssefully");

}
}
