<?php

namespace App\Http\Resources\website;

use App\Http\Resources\dashboard\ProjectImageResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WebProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'logo' => $this->logo ,
            'type' => $this->type,
            'images' => ProjectImageResource::collection($this->whenLoaded('images')),



        ];
    }
}
