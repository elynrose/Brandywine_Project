@extends('layouts.frontend')
@section('content')
<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('{{ config('captcha.sitekey') }}', {action: 'submit'}).then(function(token) {
            // Assign token to hidden field
            document.getElementById('recaptcha_token').value = token;
        });
    });
</script>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2>We would love to hear from you!</h2>
            <p>Fill out the form and we will get back to you as soon as possible.</p>

            <h4 class="mt-5">Where to find us</h4>
            <p>287 W Wesner Rd, Reading PA, 19605</p>
            <div class="map-container">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3067.947512345678!2d-75.927123456789!3d40.345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c6c123456789ab%3A0x123456789abcdef!2s287%20W%20Wesner%20Rd%2C%20Reading%2C%20PA%2019605%2C%20USA!5e0!3m2!1sen!2sus!4v1234567890123" 
                    width="100%" 
                    height="250" 
                    frameborder="0" 
                    style="border:0;" 
                    allowfullscreen="" 
                    aria-hidden="false" 
                    tabindex="0">
                </iframe>
            </div>

            <h4 class="mt-3">How to reach us</h4>
            <p> We are available by phone or email. You can also use the form to send us a message.</p>
            <p class="mb-1">
                  <i class="fa fa-phone"></i> <a class="link-dark link-offset-1 link-opacity-75 link-opacity-100-hover link-underline-opacity-0 link-underline-opacity-100-hover" href="tel:+15057922430">(610) 641-8102</a>
                  </p>
                  <p class="mb-0">
                  <i class="fa fa-envelope"></i> <a class="link-dark link-offset-1 link-opacity-75 link-opacity-100-hover link-underline-opacity-0 link-underline-opacity-100-hover" href="mailto:info@BrandywineBus.com">info@BrandywineBus.com</a>
                  </p>
        </div>
        <div class="col-md-6">

            <div class="card">
  

                <div class="card-body">
                    <form method="POST" id="form" action="{{ route("frontend.contacts.save") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="first_name">{{ trans('cruds.contact.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                            @if($errors->has('first_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('first_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="last_name">{{ trans('cruds.contact.fields.last_name') }}</label>
                            <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" required>
                            @if($errors->has('last_name'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('last_name') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.last_name_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="email">{{ trans('cruds.contact.fields.email') }}</label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="phone">{{ trans('cruds.contact.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="message">{{ trans('cruds.contact.fields.message') }}</label>
                            <textarea class="form-control" name="message" id="message" required>{{ old('message') }}</textarea>
                            @if($errors->has('message'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('message') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.message_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="pot" id="pot" value="{{ old('pot', '') }}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="recaptcha_token" id="recaptcha_token" value="{{ old('recaptcha_token', '') }}">
                    
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
@section('scripts')

@endsection