<?php

namespace App\Http\Requests\Api\v1\Accounting;

use App\Http\Responses\Api\v1\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ConPlanDeCuentasUpdateRequest extends FormRequest
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
            'idCuentaContable' => ['required', 'integer'],
            'descripcion' => ['required', 'string'],
            'idCuentaPadre' => [],
            'asiento' => ['required', 'integer'],
            'nivel' => ['required', 'integer'],
            'indexacion' => [],
            'presupuesto' => [],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'idcuentacontable' => $this->idCuentaContable,
            'idcuentapadre' => $this->idCuentaPadre
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        ErrorResponse::failedValidation($validator->errors()->first());
    }
}
