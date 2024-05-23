<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactUs\AddContactUsRequest;
use App\Http\Requests\ContactUs\EditContactUsRequest;
use App\Http\Resources\dashboard\ContactUsResource;
use App\Services\ContactUsService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function __construct(private ContactUsService $service) {}
    public function index()
    {
    $data = $this->service->getAll();
    $resource  = ContactUsResource::collection($data);
    return $this->sendResponse("get_data_sucssefuly",["data"=>$resource]);

}
public function create(AddContactUsRequest $request){
    $validatedData = $request->validated();
    $this->service->create($validatedData) ;

return $this->sendResponse("added_sucssefully");

}
}
