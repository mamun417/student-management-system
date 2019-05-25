<?php

namespace App\Http\Requests\Student;

use Illuminate\Foundation\Http\FormRequest;

class StudentStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'roll_number' => 'required|numeric|unique:students',
            'phone' => 'required|numeric|unique:students',
            'email' => 'required|email|unique:users',
            'class_id' => 'required|numeric',
            'gender' => 'in:male,female,other',
            'parent_phone' => 'required|numeric',
            'parent_id' => 'required|numeric',
            'password' => 'required|min:6',
            'age' => 'numeric|min:1',
            'date_of_birth' => 'nullable|date',
            'address' => 'nullable|string|max:255',
        ];
    }
}
