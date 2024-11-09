<?php
namespace App\Http\Requests\CraftablePro\Testimonial;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreTestimonialRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return Gate::allows("craftable-pro.testimonial.create");
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'name' => ['required','string'],
            'position' => ['required','string'],
            'rating' => ['required'],
            'content' => ['required'],
            'custom_link' => ['nullable','string'],
            'date' => ['required'],
        ];
    }
}