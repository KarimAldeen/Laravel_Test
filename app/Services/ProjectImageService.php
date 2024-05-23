<?php

namespace App\Services;

use App\Models\ProjectImage;
use App\Models\Service;
use App\Services\Base\BaseService;

class ProjectImageService extends BaseService
{

    public function __construct()
    {
        Parent::__construct(ProjectImage::class);
    }

    public function getallWithfillter($request)
    {
        $filter = $request->input('project_id');

        if (!empty($filter)) {
            $data = ProjectImage::where('project_id', $filter)->get();
        } else {
            $data = ProjectImage::all();
        }

        return $data;
    }

    public function create($data)
    {
        $image  =  ImageService::upload_image($data['image'], "ProjectImage");

        parent::create([
            'project_id' => $data['project_id'],
            'is_active' => $data['is_active'],
            "image" => $image
        ]);

        return true;
    }

    public function update($id ,$data)
    {
        if (isset($data['image']) && !empty($data['image'])) {
            $Oldimage = ProjectImage::find($id)->image ;
            $updated_image = ImageService::update_image($data['image'],$Oldimage, 'ProjectImage');
            $data['image'] = $updated_image;
        }

            parent::update($id,$data);
   }

}


