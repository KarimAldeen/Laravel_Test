<?php

namespace App\Http\Requests\Project;

use App\Http\Requests\Base\BaseFormRequest;
use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AddProjectImageRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'image' => 'required|image',
            'is_active' => [
                'required',
                'boolean',
                function ($attribute, $value, $fail) {
                    $project_id = $this->input('project_id');
                    // Check if is_active is true and no other record with is_active is true for the same project_id
                    if ($value === "0" && !ProjectImage::where('is_active', true)->where('project_id', $project_id)->exists()) {
                        $fail('At least one project must be active.');
                    }
                    // Check if is_active is true and there is already another record with is_active true for the same project_id
                    if ($value === "1" && ProjectImage::where('is_active', true)->where('project_id', $project_id)->exists()) {
                        $fail('Only one project can be active at a time.');
                    }
                },
            ],
            'project_id' => 'required|exists:projects,id',
        ];

    }
}
