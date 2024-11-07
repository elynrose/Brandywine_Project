@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inventory.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inventories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.year') }}
                        </th>
                        <td>
                            {{ $inventory->year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.category') }}
                        </th>
                        <td>
                            {{ $inventory->category->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.featured_image') }}
                        </th>
                        <td>
                            @if($inventory->featured_image)
                                <a href="{{ $inventory->featured_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $inventory->featured_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.price') }}
                        </th>
                        <td>
                            {{ $inventory->price }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.title') }}
                        </th>
                        <td>
                            {{ $inventory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.make') }}
                        </th>
                        <td>
                            {{ $inventory->make }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.vehicle_model') }}
                        </th>
                        <td>
                            {{ $inventory->vehicle_model }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.body') }}
                        </th>
                        <td>
                            {{ $inventory->body }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.capacity') }}
                        </th>
                        <td>
                            {{ $inventory->capacity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.engine') }}
                        </th>
                        <td>
                            {{ $inventory->engine }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.fuel_type') }}
                        </th>
                        <td>
                            {{ $inventory->fuel_type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.brakes') }}
                        </th>
                        <td>
                            {{ $inventory->brakes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.mileage') }}
                        </th>
                        <td>
                            {{ $inventory->mileage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.air_conditioning') }}
                        </th>
                        <td>
                            {{ App\Models\Inventory::AIR_CONDITIONING_SELECT[$inventory->air_conditioning] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.additional_information') }}
                        </th>
                        <td>
                            {!! $inventory->additional_information !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.photos') }}
                        </th>
                        <td>
                            @foreach($inventory->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.featured') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $inventory->featured ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.published') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $inventory->published ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.inventory.fields.attachment') }}
                        </th>
                        <td>
                            {{ $inventory->attachment }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inventories.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection