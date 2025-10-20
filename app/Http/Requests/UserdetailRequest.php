<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserdetailRequest extends FormRequest
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
    // UserdetailRequest.php
// ...
public function rules(): array
{
    return [
        'lastname' => 'required|string|max:255',
        'firstname' => 'required|string|max:255',
        'phone_number' => 'required|numeric|digits:8',
        'city' => 'required|string|max:100',
        'district' => 'required|string|max:100',
        'address' => 'required|string|max:500',
        'notes' => 'nullable|string|max:1000',
        'postal_code' => 'required|numeric|digits:5',
    ];
}

public function messages(): array 
{
    return [
        'lastname.required' => 'Овгоо оруулна уу.',
        'firstname.required' => 'Нэрээ оруулна уу.',
        'phone_number.required' => 'Утасны дугаараа оруулна уу.',
        'phone_number.regex' => 'Утасны дугаар буруу форматтай байна.',
        'city.required' => 'Аль орон нутаг вэ?',
        'district.required' => 'Дүүргээ оруулна уу',
        'address.required' => 'Хаягаа оруулна уу',
        'postal_code.required' => 'Шуудангийн кодоо оруулна уу.',
        
    ];
}


}
