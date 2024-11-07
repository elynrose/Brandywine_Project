<?php

namespace App\Http\Requests;

use App\Models\Inventory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInventoryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inventory_create');
    }

    public function rules()
    {
        return [
            'year' => [
                'string',
                'required',
            ],
            'stock_number' => [
                'string',
                'required',
            ],
            'category_id' => [
                'required',
                'integer',
            ],
            'featured_image' => [
                'required',
            ],
            'title' => [
                'string',
                'required',
            ],
            'make' => [
                'string',
                'required',
            ],
            'vehicle_model' => [
                'string',
                'required',
            ],
            'body' => [
                'string',
                'required',
            ],
            'capacity' => [
                'string',
                'required',
            ],
            'engine' => [
                'string',
                'required',
            ],
            'fuel_type' => [
                'string',
                'required',
            ],
            'brakes' => [
                'string',
                'required',
            ],
            'mileage' => [
                'string',
                'required',
            ],
            'air_conditioning' => [
                'required',
            ],
            'photos' => [
                'array',
                'required',
            ],
            'photos.*' => [
                'required',
            ],
            'attachment' => [
                'string',
                'nullable',
            ],
        ];
    }
}
