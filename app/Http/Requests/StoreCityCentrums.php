<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCityCentrums extends FormRequest
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
            'PostCode' => 'required|max:4',
            'Name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
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
            'PostCode' => "Add meg az irányítószámot!",
            'Name' => "Add meg a település nevét!",
            'latitude' => "Add meg szélleségi fokot!",
            'longitude' => "Add meg a hosszúsági fokot!"
        ];
    }
}
