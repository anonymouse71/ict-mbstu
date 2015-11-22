<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FacultyRequest extends Request
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
            'name'        => 'required',
            'email'       => 'required|email|unique:users,email',
            'phone'       => 'required',
            'website'     => '',
            'designation' => 'required',
            'address'     => '',
            'avatar'      => 'image',
            'bio'         => '',
            'password'    => 'required|confirmed'
        ];
    }

}
