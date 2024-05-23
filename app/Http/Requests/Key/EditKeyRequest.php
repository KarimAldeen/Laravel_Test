<?php

namespace App\Http\Requests\Key;

use App\Http\Requests\Base\BaseFormRequest;

class   EditKeyRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'key' => 'nullable|string',
            'value' => 'nullable',
            'type' => 'nullable|string|in:setting,about_us,contact_us,home',
        ];
    }
}
