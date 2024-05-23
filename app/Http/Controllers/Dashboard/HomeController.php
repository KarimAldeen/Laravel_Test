<?php


namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Services\HomeService;

class HomeController extends Controller{

    public function __construct(protected HomeService $service) {

    }
        public function index(){

            $data = $this->service->getHomeStatics();

            return $this->sendResponse(("get_data_successfully") ,$data);
        }

}
