<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

class EditServiceRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'description' => ["nullable", 'string', 'max:255'],

        ];
    }
}
