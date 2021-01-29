<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ClientsRequest extends FormRequest
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
                'login'=>'required',
                'nome'=>'required',
                'status'=>'required',
                'email'=>'required|email|unique:admins',
                'password'=>'required|min:6',
                'image'=>'required|mimes:jpg,jpeg,png',
            ];
        }else{
            return [
                'login'=>'required',
                'nome'=>'required',
                'status'=>'required',
                'email'=>'required|email|unique:usuarios,email,'.$request->user_id,
                'image'=>'mimes:jpg,jpeg,png',
                'password'=>'nullable|min:6',
            ];
        }
    }

    public function messages(){
        return [
            'login.required' => 'CPF para login é obrigatório',
            'nome.required' => 'Nome do cliente é obrigatório',
            'email.required' => 'Email do cliente é obrigatório',
            'status.required' => 'Status do cliente é obrigatório',
            'email.email' => 'Email do cliente em formato incorreto',
            'email.unique' => 'Este email encontra-se em uso na base de dados',
            'password.min' => 'Senha do cliente precisa ter no mínimo 6 caracteres',
            'password.required' => 'Senha do cliente precisa ter no mínimo 6 caracteres',
            'image.required' => 'Imagem do cliente é obrigatório',
            'image.mimes' => 'Imagem do cliente em formato incorreto, formatos aceitos: jpg,jpeg,png',
        ];
    }
}
