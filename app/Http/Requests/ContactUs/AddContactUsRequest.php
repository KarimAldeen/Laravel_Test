<?php

namespace App\Http\Requests\ContactUs;

use App\Http\Requests\Base\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class   AddContactUsRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:1000'],
        ];
    }
}
