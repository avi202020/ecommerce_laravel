<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class RolePermissionRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if($request->isMethod('post')){
            return [
                'name'=>'required',
            ];
        }else{
            return [
                'name'=>'required',
            ];
        }
    }

    public function messages(){
        return [
            'name.required' => 'Nome do perfil é obrigatório',
        ];
    }
}
