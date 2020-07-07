<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'titulo'           => 'required',
            'autor'            => 'required',
            'cod_impressao'    => 'required',
            'tipo_aquisicao'   => 'required',
            'tipo_material'    => 'required',
            'editora'          => 'required',
            'ano'              => 'integer',
            'tombo'            => '', 
            'tombo_antigo'     => '', 
            'parte'            => '', 
            'volume'           => '', 
            'fasciulo'         => '', 
            'local'            => '', 
            'colecao'          => '', 
            'isbn'             => '', 
            'link'             => '', 
            'edicao'           => '', 
            'departamento'     => '', 
            'prioridade'       => '', 
            'procedencia'      => '', 
            'finalidade'       => '', 
            'verba'            => '', 
            'processo'         => '', 
            'fornecedor'       => '', 
            'moeda'            => '', 
            'preco'            => '', 
            'nota_fiscal'      => '', 
            'data_tombamento'  => '', 
            'data_sugestao'    => '', 
            'observacao'       => '', 
            'capes'            => '', 
            'subcategoria'     => '',
            'escala'           => '',                            
        ];
    }
}