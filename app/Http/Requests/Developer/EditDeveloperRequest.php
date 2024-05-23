<?php

namespace App\Http\Requests\Developer;

use App\Http\Requests\Base\BaseFormRequest;

class EditDeveloperRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ["nullable",'string', 'max:255'],
            'description' => ["nullable",'string', 'max:255'],
            'image' => ["nullable",'image'],

        ];
    }
}
