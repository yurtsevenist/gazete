<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YazarRequest extends FormRequest
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
            'file'=>['mimes:jpg,jpeg,pdf,png,psd,bmp,jfif','max:10000'],

        ];
    }
    public function attributes()
    {
        return [
            'file' => 'Resim',
        ];
    }
}
