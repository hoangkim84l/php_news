<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'password' => 'required',
        ];
    }

    /**
     *  FORMATTED CREDENTIALS
     *  @return array
     */
    public function credentials(): array
    {
        $fieldType = filter_var($this->email, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'username';
        return [
            $fieldType => $this->email,
            'password' => $this->password,
        ];
    }

    /**
     * @return string[]
     */
    public function messages()
    {
        return [
            'email.required' => 'Email is required !',
        ];
    }
}
