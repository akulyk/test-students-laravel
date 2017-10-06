<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;


class StoreStudent extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return $this->input('Student.user_id') == Auth::user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'User.email'=>'required|email|unique:users,email,'.Auth::user()->id,
            'Student.firstname'=>'required|max:50',
            'Student.lastname'=>'required|max:50',
            'Student.gender'=>'required|max:1',
            'Student.group_number'=>'required|min:2|max:5',
            'Student.rates'=>'required|integer|between:0,200',
            'Student.birthdate'=>'required|date|date_format:Y-m-d',
            'Student.location'=>'required|in:local,foreign',
            'Student.user_id'=>'required|integer',
        ];
    }/**/

    public function attributes()
    {
        return [
            'User.email'=>'"Email" field',
            'Student.firstname'=>'"First Name" field',
            'Student.lastname'=>'"Last Name" field',
            'Student.gender' => '"Gender" field',
            'Student.group_number' => '"Group Number" field',
            'Student.birthdate'=> '"Birth Date" field',
            'Student.location' => '"Location" field',
        ];
    }

}
