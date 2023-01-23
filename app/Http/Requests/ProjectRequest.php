<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'name'=> 'required| max:150',
            'client_name'=> 'required| max:150',
            'cover_image' => 'max:5120'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Inserire il titolo',
            'name.max' => 'Consentito massimo 150 caratteri',
            'client_name.required' => 'Inserire il client',
            'client_name.max' => 'Consentito massimo 150 caratteri',
            'cover_image' => 'Grandezza massima 5MB'
        ];
    }
}
