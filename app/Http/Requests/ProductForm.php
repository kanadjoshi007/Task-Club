<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'attr' => 'required|not_in:0',
            'title' => 'required|max:255',
            'type' => 'required|max:100',
        ];
    }

    public function messages()
    {
        return [
            'attr.required' => 'Please Select a Club.',
            'title.required' => 'The Title is Required.',
            'type.required' => 'The Type  is Required,',
        ];
    }
}
