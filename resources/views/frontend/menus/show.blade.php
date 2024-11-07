@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.menu.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.menus.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $menu->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.has_sub') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Menu::HAS_SUB_SELECT[$menu->has_sub] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.parent') }}
                                    </th>
                                    <td>
                                        {{ $menu->parent->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.ordering') }}
                                    </th>
                                    <td>
                                        {{ $menu->ordering }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.url') }}
                                    </th>
                                    <td>
                                        {{ $menu->url }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.menu.fields.published') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $menu->published ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.menus.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection