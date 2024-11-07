@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.inquiry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inquiries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
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
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.inquiries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection