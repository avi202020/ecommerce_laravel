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
                'valor'=>'required',
                'foto'=>'required',
                'descricao'=>'required',
                'categoria_id'=>'required'
            ];
        }else{
            return [
                //
            ];
        }

    }

    public function messages(){
        return [
            'nome.required' => 'Nome do produto é obrigatório',
            'valor.required' => 'Valor do produto é obrigatório',
            'foto.required' => 'Imagem do produto é obrigatório',
            'descricao.required' => 'Descrição do produto é obrigatório',
            'categoria_id.required' => 'Categoria do produto é obrigatório',
        ];
    }
}
