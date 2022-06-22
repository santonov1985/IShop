<?php

namespace App\Http\Requests\Color;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'unique:colors,name,'.$this->id],
            'color' => ['required','regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/']
        ];
    }
}
