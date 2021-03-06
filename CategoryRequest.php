<?php namespace VnsModules\News;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required',
            'content' => 'required',
            'title' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>  __('This is a required field.'),
            'slug.required' =>  __('This is a required field.'),
            'content.required' =>  __('This is a required field.'),
            'title.required' =>  __('This is a required field.'),
        ];
    }

}