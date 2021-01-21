<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConfirmPasswordRequest extends FormRequest
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
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => ''
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Senha obrigatório para redefinir',
            'password.same' => 'Confirme a senha corretamente',
            'password.min' => 'Minimo de 6 caracteres para sua a senha',
            'password_confirmation.min' => 'Minimo de 6 caracteres para confirmação de senha',
        ];
    }

}
