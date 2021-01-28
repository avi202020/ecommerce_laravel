<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class AdminAccessCrudRequest extends FormRequest
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
        if($request->isMethod('post')){
            return [
                'nome'=>'required',
                'email'=>'required|email|unique:admins',
                'password'=>'required|min:6',
                'image'=>'required|mimes:jpg,jpeg,png',
            ];
        }else{
            return [
                'nome'=>'required',
                'email'=>'required|email|unique:admins,email,'.$request->user_id,
                'image'=>'mimes:jpg,jpeg,png',
                'password'=>'nullable|min:6',
            ];
        }
    }

    public function messages(){
        return [
            'nome.required' => 'Nome do usuário é obrigatório',
            'email.required' => 'Email do usuário é obrigatório',
            'email.email' => 'Email do usuário em formato incorreto',
            'email.unique' => 'Este email encontra-se em uso na base de dados',
            'password.required' => 'Senha do usuário é obrigatório',
            'password.min' => 'Senha do usuário precisa ter no mínimo 6 caracteres',
            'image.required' => 'Imagem do usuário é obrigatório',
            'image.mimes' => 'Imagem do usuário em formato incorreto, formatos aceitos: jpg,jpeg,png',
        ];
    }
}
