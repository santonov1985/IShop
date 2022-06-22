<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,'.$this->id,
            'password' => 'required|string|confirmed',
            'surname' => 'nullable|string',
            'age' => 'nullable|integer',
            'gender' => 'nullable|string',
        ];
    }
}
