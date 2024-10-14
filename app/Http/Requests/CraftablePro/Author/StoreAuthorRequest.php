<?php
namespace App\Http\Requests\CraftablePro\Author;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreAuthorRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return Gate::allows("craftable-pro.author.create");
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'first_name' => ['required','string'],
            'last_name' => ['required','string'],
            'links' => ['nullable'],
        ];
    }
}
