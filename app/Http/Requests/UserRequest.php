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
            'name' => 'required|string',
            'role' => 'required|integer',
            'email' => 'required|string|unique:users',
            'password' => 'required',
            'confirm_password' => ''
        ];
    }

    public function messages()
    {
        return [
            'email.unique' => 'Email must be a unique.',
            'description.min'  => 'description minimum length bla bla bla'
        ];
    }
}
