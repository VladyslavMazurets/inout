<?php
namespace App\Http\Requests\CraftablePro\Author;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class IndexAuthorRequest extends FormRequest
{
    /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
    public function authorize()
    {
        return Gate::allows("craftable-pro.author.index");
    }

    /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
    public function rules()
    {
        return [
            'search' => ['sometimes','string'],
            'per_page' => ['sometimes','integer'],
            'bulk_select_all' => ['sometimes','boolean'],
        ];
    }
}
