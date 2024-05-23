<?php

namespace App\Services;

use App\Models\Developer;
use App\Models\Service;
use App\Services\Base\BaseService;

class DeveloperService extends BaseService
{

    public function __construct()
    {
        Parent::__construct(Developer::class);
    }




    public function create($data)
    {
        $image  =  ImageService::upload_image($data['image'], "developer");

        parent::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'image' => $image
        ]);

        return true;
    }

    public function update($id ,$data)
    {
        if (isset($data['image']) && !empty($data['image'])) {
            $Oldimage = Developer::find($id)->image ;
            $updated_image = ImageService::update_image($data['image'],$Oldimage, 'developer');
            $data['image'] = $updated_image;
        }

            parent::update($id,$data);
   }

}
