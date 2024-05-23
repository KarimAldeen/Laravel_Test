<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\Base\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class AddProjectRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'logo' => ['required', 'image'],
            'type' => 'required|string|in:website,mobile',

        ];
    }
}
