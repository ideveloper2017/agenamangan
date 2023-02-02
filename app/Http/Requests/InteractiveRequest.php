<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InteractiveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'status' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:5120',
            'interactive_services_id' => 'required|exists:App\Models\Interactive_service,id'
        ];
    }
}
