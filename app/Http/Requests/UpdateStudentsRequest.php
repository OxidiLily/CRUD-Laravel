<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentsRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'txtnama'=>'required',
            'txtgender'=>'required',
            'txtemail'=>[
                'required',
                Rule::unique('students','email')->ignore($this->txtid,'idstudents'),
                'email'
            ],
            'txtphone'=>'required|numeric',
            'txtalamat'=>'required'
        ];
    }


    public function messages():array
    {
        return[
            'txtnama.required'=>':attribute Tidak Boleh Kosong',
            'txtemail.requared'=>':attribute sudah ada/Tidak Boleh Kosong'
        ];
    }

    public function attributes():array
    {
        return[
            'txtnama' =>'Nama Lengkap',
            'txtemail'=> 'Email'
        ];
    }
}
