<?php

namespace App\Services;

use App\Models\Project;
use App\Models\Service;
use App\Services\Base\BaseService;

class ProjectService extends BaseService
{

    public function __construct()
    {
        Parent::__construct(Project::class);
    }



    public function getAllWithRelations($request)
    {
        $filter = $request->input('type');

        if (!empty($filter)) {
            $data = Project::with('images')->where('type', $filter)->get();
        } else {
            $data = Project::with('images')->get();
        }

        return $data;
    }



    public function getallWithfillter($request)
    {
        $filter = $request->input('type');

        if (!empty($filter)) {
            $data = Project::where('type', $filter)->get();
        } else {
            $data = Project::all();
        }

        return $data;
    }
    public function create($data)
    {
        $logo  =  ImageService::upload_image($data['logo'], "Project");
        
        parent::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'logo' => $logo,
            'type' => $data['type'],

        ]);

        return true;
    }

    public function update($id ,$data)
    {

        // dd($data,"data");

        if (isset($data['logo']) &&!empty($data['logo']) ) {
            $Oldlogo = Project::find($id)->logo ;
            $updated_logo = ImageService::update_image($data['logo'],$Oldlogo, 'Project');
            $data['logo'] = $updated_logo;
        }
        if(isset($data['delete_image'])){
            
        $Oldlogo = Project::find($id)->logo ;
        ImageService::delete_image($Oldlogo);
        $data['logo'] = null;

        unset($data["delete_image"]);
    }
    unset($data["delete_image"]);

        // dd($data);
            parent::update($id,$data);
   }

}
