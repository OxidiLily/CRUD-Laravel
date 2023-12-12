<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentsRequest extends FormRequest
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
            'txtid'=>'required|unique:students,idstudents|min:7|max:7',
            'txtnama'=>'required',
            'txtgender'=>'required',
            'txtemail'=>'required|email|unique:students,email',
            'txtphone'=>'required|numeric',
            'txtalamat'=>'required'
        ];
    }


    public function messages():array
    {
        return[
            'txtid.required' => ':attribute Tidak Boleh Kosong',
            'txtid.unique'=>':attribute Data Sudah Ada',
            'txtnama.required'=>':attribute Tidak Boleh Kosong'
        ];
    }

    public function attributes():array
    {
        return[
            'txtid' =>'ID Students',
            'txtnama' =>'Nama Lengkap',
            
        ];
    }
}
