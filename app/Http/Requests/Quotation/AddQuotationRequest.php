<?php

namespace App\Http\Requests\Quotation;

use Illuminate\Foundation\Http\FormRequest;

class   AddQuotationRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'message' => 'required|string',
            'attachment' => 'required|file|mimes:pdf,doc,docx,txt',
        ];
    }
}
