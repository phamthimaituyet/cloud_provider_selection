<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

abstract class AbstractRequest extends FormRequest 
{
    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $dataResponse = [
            'code' => 422,
            'message' => $validator->errors()->toArray(),
        ];

        return response()->json($dataResponse, Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}