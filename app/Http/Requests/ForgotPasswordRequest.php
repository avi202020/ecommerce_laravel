<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ForgotPasswordRequest extends FormRequest
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
    public function rules(Request $request)
    {
        switch (Request::route()->getPrefix()) {
            case "/admin":
                return ['email'=>'required'];
            break;
            default:
                return ['login'=>'required'];
            break;
        }
         ;
    }
    public function messages()
    {
        return [
            'email.required' => 'Informe seu email para validação',
            'login.required' => 'Informe seu cpf para validação'
        ];
    }
}
