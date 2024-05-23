<?php

namespace App\Http\Resources\dashboard;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Config;

class ProjectImageResource extends JsonResource
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
            'project_id' => $this->project_id,
            'is_active' => $this->is_active,
            'image' => $this->image,
        ];
    }
}
