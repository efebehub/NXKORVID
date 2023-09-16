<?php

namespace App\Http\Requests\Api\v1\Production\Product;

use App\Http\Responses\Api\v1\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'descripcion' => ['required', 'string'],
            'descripcion_adicional' => ['string'],
            'medida' => ['string'],
            'codigo_facturacion' => ['string'],
            'codigo_equivalente1' => ['string'],
            'codigo_equivalente2' => ['string'],
            'norma' => ['string'],
            'simetrica' => ['string'],

            'idorigen' => ['required', 'numeric'],
            'idfamilia' => ['required', 'numeric'],
            'idcategoria' => ['required', 'numeric'],
            'idtipodecorte' => ['numeric'],
            'pieza_largo' => ['numeric'],
            'pieza_ancho' => ['numeric'],
            'pieza_scrap' => ['numeric'],
            'pieza_volumen' => ['numeric'],
            'pieza_sobremedida' => ['numeric'],
            'matpri_pesoespecifico' => ['numeric'],
            'matpri_idunidadmedida' => ['numeric'],
            'matpri_barra' => ['numeric'],
            'matpri_barra_kg' => ['numeric'],
            'comercial_unidadmedida' => ['numeric'],

            'idespesor_chapa' => ['numeric'],
            'comercial_idunidadmedida' => ['numeric'],
            'equipo' => ['numeric'],
            'repuesto' => ['numeric'],
            'kit' => ['numeric'],
            'consumo_interno' => ['numeric'],
            'segimiento_stock' => ['numeric'],
            'orden_produccion' => ['numeric'],
            'excluye_equipos' => ['numeric'],
            'impresión_par' => ['numeric'],
            'lote_minimo' => ['numeric'],
            'multiplo' => ['numeric'],

            'minimo_manufactura' => ['required', 'numeric'],
            'maximo_manufactura' => ['required', 'numeric'],
            'minimo_ventas' => ['required', 'numeric'],
            'maximo_ventas' => ['required', 'numeric'],
            'tiempo_abastecimiento' => ['required', 'numeric'],
            'kan_ban' => ['required', 'numeric'],
            'procedencia' => ['required', 'numeric'],
            'costo_moneda_extranjera' => ['required', 'numeric'],
            'gastos_importacion' => ['required', 'numeric'],
            'costo' => ['required', 'numeric'],
            'idmoneda' => ['required', 'numeric'],
            'nacionalidad' => ['required', 'numeric'],
            'tipo_actualizacion' => ['required', 'numeric'],
            'excluye_costos' => ['required', 'numeric'],

            'sinonimo_proveedor' => ['required', 'string'],
            'idimputacion_compras' => ['required', 'numeric'],
            'idimputacion_ventas' => ['required', 'numeric'],
            'idclasificacion' => ['required', 'numeric'],
            'user_id' => ['required', 'numeric'],

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        ErrorResponse::failedValidation($validator->errors()->first());
    }
}
