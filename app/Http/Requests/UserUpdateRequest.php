<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:users,email,'.$this->user->id,
            'password' => 'nullable|min:5|confirmed'
        ];

        if(!Auth::user()->can('edit-users'))
        {
            $rules['current_password'] = 'required';
        } else {
            $rules['role'] = 'nullable|integer|exists:roles,id';
        }

        return $rules;
    }

    public function withValidator($validator)
    {
        if(!Auth::user()->can('edit-users'))
        {
            $validator->after(function ($validator) {
                if(!Hash::check($this->current_password, $this->user->password))
                {
                    $validator->errors()->add('current_password', 'Invalid account password. Settings cannot be updated!');
                }
            });
        }
    }
}
