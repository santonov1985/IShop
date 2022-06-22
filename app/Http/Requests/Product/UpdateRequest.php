<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'brand' => 'required|integer',
            'title' => 'required|string',
            'model' => 'required|string',
            'preview_image' => 'nullable|file|max:256',
            'image' => 'nullable|file|max:2048',
            'description' => 'nullable|string|min:10',
            'quantity' => 'required|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'characteristic' => 'nullable|string|min:10',
            'category' => 'required|numeric|min:0',
            'colors' => 'nullable|array',
            'is_published' => 'nullable',
        ];
    }
}
