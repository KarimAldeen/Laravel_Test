<?php

namespace App\Http\Requests\Quotation;

use Illuminate\Foundation\Http\FormRequest;

class   EditQuotationRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'phone' => 'nullable|numeric',
            'email' => 'nullable|email',
            'message' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,txt',
        ];
    }
}
