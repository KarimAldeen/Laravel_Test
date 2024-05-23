<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\Base\BaseFormRequest;
use App\Models\Project;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditProjectImageRequest extends BaseFormRequest
{

    public function rules(): array
    {
        return [
            'image' => 'nullable|image',
            'is_active' => 'nullable|boolean',
            'project_id' => 'nullable|exists:projects,id',
        ];
    }
}
