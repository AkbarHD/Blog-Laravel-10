<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'nullable',
            'desc' => 'required',
            'img'  => 'required|image|file|mimes:png,jpg,jpeg,webp|max:2024',
            'status' => 'required',
            'publish_date' => 'required',
        ];
    }
}
