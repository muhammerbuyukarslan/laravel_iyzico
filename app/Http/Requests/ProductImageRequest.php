<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            "product_id" => "required|numeric",
            "image_url" => "required|image|mimes:jpg,jpeg,png|sometimes",
        ];
    }

    public function messages()
    {
        return [
            "product_id.required"=>"Bu alan zorunludur.",
            "product_id.numeric"=>"Bu alan sayılsal olmak zorundadır.",
            "image_url.required"=>"Bu alan zorunludur.",
            "image_url.mimes"=>"Sadece .jpg, .jpeg, .png uzantılı dosyalar yüklenebilir.",
        ]; // TODO: Change the autogenerated stub

    }
}
