<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $pageId = $this->input('id', null);
        $passwordRule = ($pageId === null) ? 'required|min:8' : 'nullable|min:8';
        return [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$pageId,
            'password' => $passwordRule,
            'confirm_password' => 'required_with:password|same:password',
            'role' => 'required',
            'lock_pin' => 'required|max:4'
        ];
    }
}
