<?php
namespace App\Http\Requests\CraftablePro\Course;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class EditCourseRequest extends FormRequest
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
        ];
    }
}