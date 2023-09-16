<?php

namespace App\Http\Requests\Api\v1\General;

use App\Http\Responses\Api\v1\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GenLocalidadUpdateRequest extends FormRequest
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
        $method = $this->method();

        if ($method=='PUT') {

            return [
                'localidad' => ['required', 'string'],
                'idProvincia' => [],
                'cp' => []
            ];

        } else {

            return [
                'localidad' => ['sometimes', 'required', 'string'],
                'idProvincia' => ['sometimes', 'required', 'integer'],
                'cp' => []
            ];
            

        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'idprovincia' => $this->idProvincia,
            'descripcion' => $this->localidad
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        ErrorResponse::failedValidation($validator->errors()->first());
    }
}
