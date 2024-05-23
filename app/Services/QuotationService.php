<?php

namespace App\Services;

use App\Models\Quotation;
use App\Models\Service;
use App\Services\Base\BaseService;

class QuotationService extends BaseService
{

    public function __construct()
    {
        Parent::__construct(Quotation::class);
    }




    public function create($data)
    {
        $attachment  =  ImageService::upload_image($data['attachment'], "Quotation");

        parent::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'message' => $data['message'],
            'attachment' => $attachment
        ]);

        return true;
    }


    public function update($id ,$data)
    {
        if (isset($data['attachment']) && !empty($data['attachment'])) {
            $updated_attachment = ImageService::update_image($data['attachment'], 'contactUs');
             parent::update($id,array_merge($data, ['attachment' => $updated_attachment]));
        }

         parent::update($id,$data);
   }

}
