<?php

namespace Ingresse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email' => 'unique:users',
        ];
    }

    /**
     *
     * Get the validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.unique' => 'email cannot be duplicated',
        ];
    }
}
