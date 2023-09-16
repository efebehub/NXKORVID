<?php

namespace App\Http\Requests\Api\v1\General;

use App\Http\Responses\Api\v1\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GenImpuestoUpdateRequest extends FormRequest
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
            'descripcion'=> ['required', 'string'],
            'porcentaje'=> ['required', 'regex:/[0-9]+(\.[0-9][0-9]?)?/'],
            'compras'=> ['required', 'integer'],
            'ventas'=> ['required', 'integer'],
            'codigoWsfe'=> [],
            'idCuentacontableD'=> [],
            'idCuentacontableH'=> []
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'codigowsfe'=> $this->codigoWsfe,
            'idcuentacontabled'=> $this->idCuentacontableD,
            'idcuentacontableh'=> $this->idCuentacontableH
            
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        ErrorResponse::failedValidation($validator->errors()->first());
    }
}
