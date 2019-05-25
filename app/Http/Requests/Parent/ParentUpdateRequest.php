<?php

namespace App\Http\Requests\Parent;

use App\AllParent;
use App\Teacher;
use Illuminate\Foundation\Http\FormRequest;

class ParentUpdateRequest extends FormRequest
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
        $current_user = AllParent::find($this->parent);

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $current_user->user_id,
            'phone' => 'required|numeric|unique:parents,phone,'. $this->parent,
            'password' => 'nullable|min:6',
            'age' => 'nullable|numeric|min:1',
            'gender' => 'nullable|in:male,female',
            'address' => 'nullable|string|max:255',
        ];
    }
}
