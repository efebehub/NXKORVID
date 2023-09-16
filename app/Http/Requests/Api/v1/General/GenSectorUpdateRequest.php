<?php

namespace App\Http\Requests\Api\v1\General;

use App\Http\Responses\Api\v1\ErrorResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class GenSectorUpdateRequest extends FormRequest
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
                'sector' => ['required', 'string'],
                'idNave' => ['required', 'integer']
            ];

        } else {

            return [
                'sector' => ['sometimes', 'required', 'string'],
                'idNave' => ['sometimes', 'required', 'integer']
            ];
            

        }
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'idnave' => $this->idNave,
            'descripcion' => $this->sector
        ]);
    }

    protected function failedValidation(Validator $validator)
    {
        ErrorResponse::failedValidation($validator->errors()->first());
    }
}
