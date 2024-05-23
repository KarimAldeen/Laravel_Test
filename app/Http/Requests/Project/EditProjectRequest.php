<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\Base\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class EditProjectRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:255'],
            'logo' => ['nullable', 'image'],
            'type' => 'nullable|string|in:website,mobile',
            "delete_image"=>["nullable","boolean"],

        ];
    }


}
