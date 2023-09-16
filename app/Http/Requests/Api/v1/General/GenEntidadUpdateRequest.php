<?php

namespace App\Http\Requests\Api\v1\General;

use App\Http\Responses\Api\v1\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GenEntidadUpdateRequest extends FormRequest
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
            'nombre'=> ['required', 'string'],
            'domicilio'=> [],
            'telefono'=> [],
            'fax'=> [],
            'mail'=> [],
            'cuit'=> [],
            'iibb'=> [],
            'fechaNacimiento'=> [],
            'cbu'=> [],
            'esCliente'=> ['required', 'integer'],
            'esProveedor'=> ['required', 'integer'],
            'esEntfin'=> ['required', 'integer'],
            'esAgencia'=> ['required', 'integer'],
            'esVendedor'=> ['required', 'integer'],
            'esConcesionario'=> ['required', 'integer'],
            'esTransporte'=> ['required', 'integer'],
            'esEmpleado'=> ['required', 'integer'],
            'idTipoIva'=> [],
            'idListaPrecios'=> [],
            'idVendedor'=> [],
            'idLocalidad' => [],
            'idCuentaContable' => []
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'fechanacimiento'=> $this->fechaNacimiento,
            'escliente'=> $this->esCliente,
            'esproveedor'=> $this->esProveedor,
            'esentfin'=> $this->esEntfin,
            'esagencia'=> $this->esAgencia,
            'esvendedor'=> $this->esVendedor,
            'esconcesionario'=> $this->esConcesionario,
            'estransporte'=> $this->esTransporte,
            'esempleado'=> $this->esEmpleado,
            'idtipoiva'=> $this->idTipoIva,
            'idlistaprecios'=> $this->idListaPrecios,
            'idvendedor'=> $this->idVendedor,
            'idlocalidad' => $this->idLocalidad,
            'idcuentacontable' => $this->idCuentaContable,
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        ErrorResponse::failedValidation($validator->errors()->first());
    }
}
