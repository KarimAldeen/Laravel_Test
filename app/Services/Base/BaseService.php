<?php

namespace App\Services\Base;

use App\Exceptions\NotFoundException;
use App\Services\ImageService;
use Exception;

class BaseService
{
    protected $className;
    public function __construct($className)
    {
        $this->className = new $className;
    }


    public function getAll()
    {
        $className = $this->className;
        $data = $className::all();
        return  $data;
    }


    public function getOne($id)
    {
        $className = $this->className;

        $data = $className::find($id);
        if (!$data){
            throw new NotFoundException();
        }
        return $data;
    }
    public function destroy($id)
    {
        $className = $this->className;
        $deleted = $className::where("id", $id)->delete();
        if (!$deleted){
            throw new NotFoundException();
        }

    }
    public function delete_with_image($id, $image_field_name)
    {
        $className = $this->className;
        $data = $className::where("id", $id)->first();
        if (!$data) {
            throw new NotFoundException();
        }
        ImageService::delete_image($data->$image_field_name);
        $data->delete();
    }

    public function create($data)
    {
        return $this->className->create($data);
    }
    public function update($id, $data)
    {
        $className = $this->className;

        $updated = $className::where("id", $id)->update($data);
        if (!$updated){
            throw new NotFoundException();
        }
    }
}
