@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        @if($inquiry->inventory)
        <h3 class="mt-5">
            New Inquiry for   ({{ $inquiry->inventory->year }}   {{ $inquiry->inventory->make }}  {{ $inquiry->inventory->vehicle_model }})
        </h3>
            <div class="card mb-3 mt-3">
              
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-6">
                        @foreach($inquiry->inventory->photos as $photo)
                                        <img src="{{ $photo->getUrl() }}" alt="Inventory Picture" class="img-fluid">
                                    @endforeach
                        </div>
                        <div class="col-md-6">
                        <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                                <th>
                                    {{ trans('cruds.inventory.fields.id') }}
                                </th>
                                <td>
                                    {{ $inquiry->inventory->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.inventory.fields.year') }}
                                </th>
                                <td>
                                    {{ $inquiry->inventory->year }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.inventory.fields.make') }}
                                </th>
                                <td>
                                    {{ $inquiry->inventory->make }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.inventory.fields.vehicle_model') }}
                                </th>
                                <td>
                                    {{ $inquiry->inventory->vehicle_model }}
                                </td>
                            </tr>
                       
                        </tbody>
                    </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.inquiry.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inquiry.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $inquiry->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inquiry.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $inquiry->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inquiry.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $inquiry->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inquiry.fields.phone_number') }}
                                    </th>
                                    <td>
                                        {{ $inquiry->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inquiry.fields.comment') }}
                                    </th>
                                    <td>
                                        {{ $inquiry->comment }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inquiry.fields.inventory') }}
                                    </th>
                                    <td>
                                        {{ $inquiry->inventory->year ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.inquiry.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $inquiry->address }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                     
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection