<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreMaps extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Address' => 'required',
            'GymName' => 'required',
            'OpenHour' => 'required',
            'CordinationId' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }

    public function messages():array
    {
        return [
            'CityName' => "Add meg a címet!",
            'GymName' => "Add meg a edzőterem nevét!",
            'OpenHour' => "Add meg meddig van nyitva!",
            'CordinationId' => "Add meg, hogy melyik koordináta id tartozik hozzá!"
        ];
    }
}
