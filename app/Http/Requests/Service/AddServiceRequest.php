<?php

namespace App\Http\Requests\Service;

use App\Http\Requests\Base\BaseFormRequest;

class AddServiceRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],

        ];
    }


}
