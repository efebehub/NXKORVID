<?php

namespace App\Http\Requests\Api\v1\Production\Product;

use App\Http\Responses\Api\v1\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'codigo' => ['required', 'string'],
            'indice_modificacion' => ['string'],
            'descripcion' => ['string'],
            'descripcion_adicional' => ['string'],
            'medida' => ['string'],
            'simetrica' => ['string'],
            'codigo_facturacion' => ['string'],
            'codigo_equivalente1' => ['string'],
            'codigo_equivalente2' => ['string'],
            'norma' => ['string'],
            'idorigen' => ['numeric'],
            'idfamilia' => ['numeric'],
            'idcategoria' => ['numeric'],
            'idtipodecorte' => ['numeric'],
            'pieza_largo' => ['numeric'],
            'pieza_ancho' => ['numeric'],
            'pieza_scrap' => ['numeric'],
            'pieza_volumen' => ['numeric'],
            'pieza_sobremedida' => ['numeric'],
            'matpri_pesoespecifico' => ['numeric'],
            'matpri_unidadmedida' => ['numeric'],
            'matpri_barra' => ['numeric'],
            'matpri_barra_kg' => ['numeric'],
            'comercial_unidadmedida' => ['numeric'],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        ErrorResponse::failedValidation($validator->errors()->first());
    }
}
