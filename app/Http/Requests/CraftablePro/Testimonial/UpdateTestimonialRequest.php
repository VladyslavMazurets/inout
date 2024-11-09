<?php
namespace App\Http\Requests\CraftablePro\Testimonial;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateTestimonialRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return Gate::allows("craftable-pro.testimonial.edit");
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'name' => ['sometimes','string'],
            'position' => ['sometimes','string'],
            'rating' => ['sometimes'],
            'content' => ['sometimes'],
            'custom_link' => ['nullable','string'],
            'date' => ['sometimes'],
        ];
    }
}
