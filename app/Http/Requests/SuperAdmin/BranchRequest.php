<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
        return [
            'branch_name'    => 'required|string',
            'owner_name'     => 'required|string',
            'address'        => 'required|string',
            'city'           => 'required|string',
            'zip_code'       => 'required|string',
            'state'          => 'required|string',
            'country'        => 'required|string',
            'mobile_number'  => 'required|regex:/^[\d\-\+]{7,15}$/',
            'email'          => 'required|email',
            'logo'           => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    /**
     * Get the custom attributes for the validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'branch_name'   => 'Branch Name',
            'owner_name'    => 'Owner Name',
            'address'       => 'Address',
            'city'          => 'City',
            'zip_code'      => 'Zip Code',
            'state'         => 'State',
            'country'       => 'Country',
            'mobile_number' => 'Mobile Number',
            'email'         => 'Email Address',
            'logo'          => 'Logo',
        ];
    }
}
