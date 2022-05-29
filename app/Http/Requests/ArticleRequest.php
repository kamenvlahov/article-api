<?php

namespace App\Http\Requests;

class ArticleRequest extends Request
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'body' => 'required'
        ];
    }
}
