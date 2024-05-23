<?php

namespace App\Http\Requests\Key;

use App\Http\Requests\Base\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class   AddKeyRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'key' => 'required|string',
            'value' => 'required',
            'type' => 'nullable|string|in:setting,about_us,contact_us,home',
            ];
    }
}
