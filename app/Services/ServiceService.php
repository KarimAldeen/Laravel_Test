<?php



namespace App\Services;

use App\Models\Service;
use App\Services\Base\BaseService;


class ServiceService  extends BaseService {

    public function __construct() {
        parent::__construct(Service::class);
    }


    public function create($data)
    {
        parent::create([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        return true;
    }

    public function update($id ,$data)
    {
            parent::update($id,$data);
   }


}
