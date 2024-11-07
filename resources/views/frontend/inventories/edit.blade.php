@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.inventory.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.inventories.update", [$inventory->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="year">{{ trans('cruds.inventory.fields.year') }}</label>
                            <input class="form-control" type="text" name="year" id="year" value="{{ old('year', $inventory->year) }}" required>
                            @if($errors->has('year'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('year') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.year_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="category_id">{{ trans('cruds.inventory.fields.category') }}</label>
                            <select class="form-control select2" name="category_id" id="category_id" required>
                                @foreach($categories as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('category_id') ? old('category_id') : $inventory->category->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.category_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="featured_image">{{ trans('cruds.inventory.fields.featured_image') }}</label>
                            <div class="needsclick dropzone" id="featured_image-dropzone">
                            </div>
                            @if($errors->has('featured_image'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('featured_image') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.featured_image_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="price">{{ trans('cruds.inventory.fields.price') }}</label>
                            <input class="form-control" type="number" name="price" id="price" value="{{ old('price', $inventory->price) }}" step="0.01">
                            @if($errors->has('price'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('price') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.price_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="title">{{ trans('cruds.inventory.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', $inventory->title) }}" required>
                            @if($errors->has('title'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('title') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="make">{{ trans('cruds.inventory.fields.make') }}</label>
                            <input class="form-control" type="text" name="make" id="make" value="{{ old('make', $inventory->make) }}" required>
                            @if($errors->has('make'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('make') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.make_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="vehicle_model">{{ trans('cruds.inventory.fields.vehicle_model') }}</label>
                            <input class="form-control" type="text" name="vehicle_model" id="vehicle_model" value="{{ old('vehicle_model', $inventory->vehicle_model) }}" required>
                            @if($errors->has('vehicle_model'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('vehicle_model') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.vehicle_model_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="body">{{ trans('cruds.inventory.fields.body') }}</label>
                            <input class="form-control" type="text" name="body" id="body" value="{{ old('body', $inventory->body) }}" required>
                            @if($errors->has('body'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('body') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.body_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="capacity">{{ trans('cruds.inventory.fields.capacity') }}</label>
                            <input class="form-control" type="text" name="capacity" id="capacity" value="{{ old('capacity', $inventory->capacity) }}" required>
                            @if($errors->has('capacity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('capacity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.capacity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="engine">{{ trans('cruds.inventory.fields.engine') }}</label>
                            <input class="form-control" type="text" name="engine" id="engine" value="{{ old('engine', $inventory->engine) }}" required>
                            @if($errors->has('engine'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('engine') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.engine_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="fuel_type">{{ trans('cruds.inventory.fields.fuel_type') }}</label>
                            <input class="form-control" type="text" name="fuel_type" id="fuel_type" value="{{ old('fuel_type', $inventory->fuel_type) }}" required>
                            @if($errors->has('fuel_type'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fuel_type') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.fuel_type_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="brakes">{{ trans('cruds.inventory.fields.brakes') }}</label>
                            <input class="form-control" type="text" name="brakes" id="brakes" value="{{ old('brakes', $inventory->brakes) }}" required>
                            @if($errors->has('brakes'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('brakes') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.brakes_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="mileage">{{ trans('cruds.inventory.fields.mileage') }}</label>
                            <input class="form-control" type="text" name="mileage" id="mileage" value="{{ old('mileage', $inventory->mileage) }}" required>
                            @if($errors->has('mileage'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mileage') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.mileage_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required">{{ trans('cruds.inventory.fields.air_conditioning') }}</label>
                            <select class="form-control" name="air_conditioning" id="air_conditioning" required>
                                <option value disabled {{ old('air_conditioning', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Inventory::AIR_CONDITIONING_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('air_conditioning', $inventory->air_conditioning) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('air_conditioning'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('air_conditioning') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.air_conditioning_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="additional_information">{{ trans('cruds.inventory.fields.additional_information') }}</label>
                            <textarea class="form-control ckeditor" name="additional_information" id="additional_information">{!! old('additional_information', $inventory->additional_information) !!}</textarea>
                            @if($errors->has('additional_information'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('additional_information') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.additional_information_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="photos">{{ trans('cruds.inventory.fields.photos') }}</label>
                            <div class="needsclick dropzone" id="photos-dropzone">
                            </div>
                            @if($errors->has('photos'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('photos') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.photos_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="featured" value="0">
                                <input type="checkbox" name="featured" id="featured" value="1" {{ $inventory->featured || old('featured', 0) === 1 ? 'checked' : '' }}>
                                <label for="featured">{{ trans('cruds.inventory.fields.featured') }}</label>
                            </div>
                            @if($errors->has('featured'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('featured') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.featured_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="published" value="0">
                                <input type="checkbox" name="published" id="published" value="1" {{ $inventory->published || old('published', 0) === 1 ? 'checked' : '' }}>
                                <label for="published">{{ trans('cruds.inventory.fields.published') }}</label>
                            </div>
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="attachment">{{ trans('cruds.inventory.fields.attachment') }}</label>
                            <input class="form-control" type="text" name="attachment" id="attachment" value="{{ old('attachment', $inventory->attachment) }}">
                            @if($errors->has('attachment'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attachment') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.inventory.fields.attachment_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.featuredImageDropzone = {
    url: '{{ route('frontend.inventories.storeMedia') }}',
    maxFilesize: 6, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 6,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="featured_image"]').remove()
      $('form').append('<input type="hidden" name="featured_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="featured_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($inventory) && $inventory->featured_image)
      var file = {!! json_encode($inventory->featured_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="featured_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('frontend.inventories.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $inventory->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    var uploadedPhotosMap = {}
Dropzone.options.photosDropzone = {
    url: '{{ route('frontend.inventories.storeMedia') }}',
    maxFilesize: 6, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 6,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="photos[]" value="' + response.name + '">')
      uploadedPhotosMap[file.name] = response.name
    },
    removedfile: function (file) {
      console.log(file)
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedPhotosMap[file.name]
      }
      $('form').find('input[name="photos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($inventory) && $inventory->photos)
      var files = {!! json_encode($inventory->photos) !!}
          for (var i in files) {
          var file = files[i]
          this.options.addedfile.call(this, file)
          this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
          file.previewElement.classList.add('dz-complete')
          $('form').append('<input type="hidden" name="photos[]" value="' + file.file_name + '">')
        }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}

</script>
@endsection