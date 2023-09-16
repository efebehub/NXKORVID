<?php

namespace App\Http\Requests\Api\v1\General;

use App\Http\Responses\Api\v1\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GenTipoComprobanteStoreRequest extends FormRequest
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
            'descripcion' => ['required', 'string'],
            'modulo' => ['required', 'string'],
            'fondos' => ['required', 'integer'],
            'ctacte' => ['required', 'integer'],
            'stock' => ['required', 'integer'],
            'asiento' => ['required', 'integer'],
            'iva' => ['required', 'integer'],
            'tipoComprobante' => ['required', 'string'],
            'idTalonario' => ['required', 'integer'],
            'codigoWsfe' => [],
            'idCuentacontableD' => [],
            'idCuentacontableH' => []
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'tipocomprobante' => $this->tipoComprobante,
            'idtalonario' => $this->idTalonario,
            'codigowsfe' => $this->codigoWsfe,
            'idcuentacontabled' => $this->idCuentacontableD,
            'idcuentacontableh' => $this->idCuentacontableH,
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        ErrorResponse::failedValidation($validator->errors()->first());
    }
}
