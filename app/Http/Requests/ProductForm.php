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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'attr' => 'required',
            'title' => 'required|max:255',
            'Ptitle' => 'required|max:255',
            'type'=> 'required|max:100',
        ];
    }

    public function messages()
{
    return [
        'attr.required' => 'The Club_id field is required.',
        'title.required' => 'The title field is required.',
        'Ptitle.required'=>'The product_title field is required.',
        'type.required' => 'The product_title field is required,',
        
    ];
}
}
