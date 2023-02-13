<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends AbstractRequest
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
            'name' => 'required|string|unique:users',
            'role' => 'required|integer',
            'email' => 'required|string',
            'password' => 'required',
            'confirm_password' => ''
        ];
    }

    public function messages()
    {
        return [
            'name.unique' => 'name must be a unique.',
            'description.min'  => 'description minimum length bla bla bla'
        ];
    }
}
