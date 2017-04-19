<?php namespace VnsModules\News;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->input('id');
        return [
            'name' => 'required',
            'slug' => 'required|unique:posts,slug,' . $id . ',id,model,VnsModules\News\News',
            'title' => 'required|unique:posts,title,' . $id,
            'excerpt' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' =>  __('This is a required field.'),
            'slug.required' =>  __('This is a required field.'),
            'slug.unique' =>  __('Slug already exists.'),
            'title.required' =>  __('This is a required field.'),
            'title.unique' =>  __('Title already exists.'),
            'excerpt.required' =>  __('This is a required field.'),
            'content.required' =>  __('This is a required field.'),
        ];
    }

}