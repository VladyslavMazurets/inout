<?php

namespace App\Http\Requests\CraftablePro\Instructor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateInstructorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows("craftable-pro.instructor.edit");
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'first_name' => ['sometimes', 'string'],
            'last_name' => ['sometimes', 'string'],
            'slug' => ['sometimes', 'string'],
            'description' => ['nullable'],
            'position' => ['nullable', 'string'],
            'instagram_link' => ['nullable', 'string'],
            'telegram_link' => ['nullable', 'string'],
            'custom_link' => ['nullable', 'string'],
        ];
    }
}
