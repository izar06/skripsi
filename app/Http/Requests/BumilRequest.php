<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BumilRequest extends FormRequest
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
            'nama_ibu' => 'required',
            'NIK' => 'required|max:16',
            'umur' => 'required|numeric',
            'alamat' => 'required',
            'masa_kehamilan' => 'required'
        ];
    }
}
