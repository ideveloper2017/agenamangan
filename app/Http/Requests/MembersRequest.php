<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembersRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'specialty' => ['required', 'string'],
            'working_time' => ['required', 'string'],
            'experience' => ['required', 'string'],
            'description' => ['required', 'string'],
            'contact' => ['required', 'string'],
            'facebook' => ['required', 'string'],
            'twitter' => ['required', 'string'],
            'instagram' => ['required', 'string'],
            'google' => ['required', 'string'],
            'image'=> ['mimes:jpeg,jpg,png,gif|max:1000'],
        ];
    }
}
