<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TagRequest extends FormRequest
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
            'name' => 'required',
            'slug' => [
                'required',
                'alpha_dash',
                Rule::unique('canvas_tags')->where(function ($query) {
                    return $query->where('slug', request('slug'))->where('user_id', request()->user('canvas')->id);
                })->ignore(request('id'))->whereNull('deleted_at'),
            ],
        ];
    }
}
