@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.menu.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.menus.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="name">{{ trans('cruds.menu.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.menu.fields.has_sub') }}</label>
                            <select class="form-control" name="has_sub" id="has_sub" required>
                                <option value disabled {{ old('has_sub', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Menu::HAS_SUB_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('has_sub', '0') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('has_sub'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('has_sub') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.has_sub_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="parent_id">{{ trans('cruds.menu.fields.parent') }}</label>
                            <select class="form-control select2" name="parent_id" id="parent_id">
                                @foreach($parents as $id => $entry)
                                    <option value="{{ $id }}" {{ old('parent_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('parent'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('parent') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.parent_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="page_id">{{ trans('cruds.menu.fields.page') }}</label>
                            <select class="form-control select2" name="page_id" id="page_id">
                                @foreach($pages as $id => $entry)
                                    <option value="{{ $id }}" {{ old('page_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('page'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('page') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.page_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ordering">{{ trans('cruds.menu.fields.ordering') }}</label>
                            <input class="form-control" type="number" name="ordering" id="ordering" value="{{ old('ordering', '') }}" step="1">
                            @if($errors->has('ordering'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('ordering') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.ordering_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="url">{{ trans('cruds.menu.fields.url') }}</label>
                            <input class="form-control" type="text" name="url" id="url" value="{{ old('url', '') }}">
                            @if($errors->has('url'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('url') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.url_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ old('published', 0) == 1 ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.menu.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.menu.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection