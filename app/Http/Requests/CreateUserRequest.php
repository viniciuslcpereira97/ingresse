<?php

namespace Ingresse\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required',
            'birth' => 'required',
            'email' => 'required|unique:users',
            'company_id' => 'required',
            'password' => 'required',
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
            'required' => ':attribute is required',
            'email.unique' => 'email cannot be duplicated',
        ];
    }
}
