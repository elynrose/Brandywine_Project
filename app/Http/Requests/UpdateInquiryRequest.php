<?php

namespace App\Http\Requests;

use App\Models\Inquiry;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInquiryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inquiry_edit');
    }

    public function rules()
    {
        return [
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'inventory_id' => [
                'required',
                'integer',
            ],
            'address' => [
                'string',
                'nullable',
            ],
        ];
    }
}
