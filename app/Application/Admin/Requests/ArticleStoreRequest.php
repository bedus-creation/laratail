<?php

namespace App\Application\Admin\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ArticleStoreRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
        ]);
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3'
        ];
    }
}
