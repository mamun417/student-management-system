<?php

namespace App\Http\Requests\Teacher;

use App\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class TeacherUpdateRequest extends FormRequest
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
        $current_user = Teacher::find($this->teacher);

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $current_user->user_id,
            'phone' => 'required|numeric|unique:teachers,phone,'. $this->teacher,
            'password' => 'nullable|min:6',
            'subject' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
        ];
    }
}
