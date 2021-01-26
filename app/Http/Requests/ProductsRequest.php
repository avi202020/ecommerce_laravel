<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductsRequest extends FormRequest
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
                'categoria_id'=>'required',
                'valor'=>'required',
                'foto'=>'required|mimes:jpg,jpeg,png',
                'descricao'=>'required',
            ];
        }else{
            return [
                'nome'=>'required',
                'categoria_id'=>'required',
                'valor'=>'required',
                'descricao'=>'required',
                'foto'=>'mimes:jpg,jpeg,png',
            ];
        }
    }

    public function messages(){
        return [
            'nome.required' => 'Nome do produto é obrigatório',
            'valor.required' => 'Valor do produto é obrigatório',
            'foto.required' => 'Imagem do produto é obrigatório',
            'foto.mimes' => 'Imagem do produto em formato inválido, formatos aceitos: jpg,jpeg,png',
            'descricao.required' => 'Descrição do produto é obrigatório',
            'categoria_id.required' => 'Categoria do produto é obrigatório',
        ];
    }
}
