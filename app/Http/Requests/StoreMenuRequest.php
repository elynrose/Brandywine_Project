<?php

namespace App\Http\Requests;

use App\Models\Menu;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMenuRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('menu_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'has_sub' => [
                'required',
            ],
            'ordering' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'url' => [
                'string',
                'nullable',
            ],
        ];
    }
}
