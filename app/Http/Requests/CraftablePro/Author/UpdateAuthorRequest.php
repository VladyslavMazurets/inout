<?php
namespace App\Http\Requests\CraftablePro\Author;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateAuthorRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return Gate::allows("craftable-pro.author.edit");
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'first_name' => ['sometimes','string'],
            'last_name' => ['sometimes','string'],
            'links' => ['nullable'],
        ];
    }
}
