<?php
namespace App\Http\Requests\CraftablePro\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateCourseRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return Gate::allows("craftable-pro.course.edit");
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'title' => ['sometimes','string'],
            'slug' => ['sometimes','string'],
            'description' => ['sometimes'],
            'price' => ['sometimes'],
            'discount' => ['nullable'],
            'duration' => ['sometimes'],
            'content' => ['sometimes'],
        ];
    }
}
