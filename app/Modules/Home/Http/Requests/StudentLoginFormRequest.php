<?php

namespace App\Modules\Home\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentLoginFormRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        { 
            return [
                'username' => 'required',
                'full_name' => 'required',
                'email' => 'required|unique:students',
                'password' => 'required|min:6|same:c_password',
                'c_password' => 'min:6',
            ];
        }
    }


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}