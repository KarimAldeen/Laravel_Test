<?php

namespace App\Http\Requests\ContactUs;

use App\Http\Requests\Base\BaseFormRequest;

class   EditContactUsRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
