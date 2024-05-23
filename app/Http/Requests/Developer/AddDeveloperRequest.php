<?php

namespace App\Http\Requests\Developer;

use App\Http\Requests\Base\BaseFormRequest;

class AddDeveloperRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'image' => ['required', 'image'],
        ];
    }
}
