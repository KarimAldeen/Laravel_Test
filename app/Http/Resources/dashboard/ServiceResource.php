<?php

namespace App\Http\Resources\dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $app_base_url = Config::get('appSetting.app_base_url');

        return [
            "id"=> $this->id,
            'title' => $this->title,
            'description' => $this->description,
        ];
    }
}
