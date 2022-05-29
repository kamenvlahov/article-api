<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image' => 'mimes:jpeg,jpg,png|required|max:10000'
        ];
    }
}
