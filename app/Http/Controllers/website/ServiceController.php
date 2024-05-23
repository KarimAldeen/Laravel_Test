<?php

namespace App\Http\Controllers\website;

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


}
