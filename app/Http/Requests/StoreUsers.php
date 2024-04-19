<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUsers extends FormRequest
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
        $rules = [
            'UserName' => 'required',
            'Email' => 'required',
            'FirstName' => 'required',
            'LastName' => 'required'
        ];

        if ($this->request->get("Password")) {
            $rules['Password'] = 'required';
        }

        return $rules;
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
            'UserName' => "Add meg a felhasználó nevet!",
            'Password' => "Add meg a jelszót!",
            'Email' => "Add meg az email címedet!",
            'FirstName' => "Add meg a keresztnevedet!",
            'LastName' => "Add meg a vezetéknevedet!"
        ];
    }
}
