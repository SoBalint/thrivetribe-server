<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreTrainings extends FormRequest
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
            'Name' => 'required',
            'Text' => 'required',
            'Type' => 'required',
            'UploadeDate' => 'required',
            'Author' => 'required'
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
            'Name' => "Add meg az edzés nevét!",
            'Text' => "Add meg a szöveget!",
            'Type' => "Add meg az edzés fajtáját!",
            'UploadeDate' => "Add meg mikor töltötték fel!"
        ];
    }
}
