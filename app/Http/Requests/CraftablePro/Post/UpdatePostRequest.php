<?php

namespace App\Http\Requests\CraftablePro\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows("craftable-pro.post.edit");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => ['sometimes', 'string'],
            'slug' => ['sometimes', 'string'],
            'content' => ['sometimes'],
            'date' => ['nullable'],
        ];
    }
}
