<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BusinessRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'business_title' => 'required|string|max:255',
            'description' => 'required',
            'check_in' => 'required',
            'check_out' => 'required',
            'age_restriction' => 'required|string|max:255',
            'pets_permission' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'features' => 'array',
            'features.*' => 'exists:feature_services,id',
        ];
    }
}
