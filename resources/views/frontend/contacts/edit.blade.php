@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.contact.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.contacts.update", [$contact->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.contact.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', $contact->first_name) }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.contact.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', $contact->last_name) }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.contact.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email', $contact->email) }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="phone">{{ trans('cruds.contact.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $contact->phone) }}" required>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="message">{{ trans('cruds.contact.fields.message') }}</label>
                            <textarea class="form-control" name="message" id="message" required>{{ old('message', $contact->message) }}</textarea>
                            @if($errors->has('message'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('message') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.message_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="pot">{{ trans('cruds.contact.fields.pot') }}</label>
                            <input class="form-control" type="text" name="pot" id="pot" value="{{ old('pot', $contact->pot) }}">
                            @if($errors->has('pot'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('pot') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.pot_helper') }}</span>
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