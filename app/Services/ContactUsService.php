<?php

namespace App\Services;

use App\Models\ContactUs;
use App\Models\Service;
use App\Services\Base\BaseService;

class ContactUsService extends BaseService
{

    public function __construct()
    {
        Parent::__construct(ContactUs::class);
    }




    public function create($data)
    {
        parent::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);

        return true;
    }

    public function update($id ,$data)
    {
             parent::update($id,$data);
   }

}
