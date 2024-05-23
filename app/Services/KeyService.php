<?php

namespace App\Services;

use App\Models\Key;
use App\Models\Service;
use App\Services\Base\BaseService;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Client\Request;

class KeyService extends BaseService
{

    public function __construct()
    {
        Parent::__construct(Key::class);
    }



    public function getallWithfillter($request)
    {
        $filter = $request->input('type');

        if (!empty($filter)) {
            $data = Key::where('type', $filter)->get();
        } else {
            $data = Key::all();
        }

        return $data;
    }



    public function create($data)
    {
        if (gettype($data['value']) === "object") {
            $image  =  ImageService::upload_image($data['value'], "key");

            parent::create([
                'key' => $data['key'],
                'value' =>   $image ,
                'type' => $data['type'],
            ]);
        } else {
            parent::create([
                'key' => $data['key'],
                'value' => $data['value'],
                'type' => $data['type']
            ]);
        }
        return true;
    }

    public function update($id, $data)
    {
        if (gettype($data['value']) === "object") {
            $Oldimage = Key::find($id)->value;
            $updated_image = ImageService::update_image($data['value'], $Oldimage, 'key');
            $data['value'] = $updated_image;
        }

        parent::update($id, $data);
    }
}
