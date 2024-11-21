@extends('layouts.frontend')
@section('content')
<div class="container mt-5">
<div class="card">

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            
            <div class="row">
                <div class="col-md-6">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
    @if($inventory->featured_image)
                                    <img src="{{ $inventory->featured_image->getUrl() }}" class="d-block w-100" alt="{{ $inventory->title ?? 'Inventory' }}">
                            @endif
    </div>
        @foreach($inventory->photos as $key => $media)
        <div class="carousel-item">                                
            <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ $inventory->title ?? 'Inventory' }}">
        </div>
        @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>

                <div class="col-md-6">
                <ul class="list-group" id="inventory-details">
                   @if($inventory->stock_number)
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.stock_number') }}:</strong></div>
                                <div class="col-md-6">{{ $inventory->stock_number }}</div>
                            </div>
                        </li>
                   @endif
                    @if(!empty($inventory->title))
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.title') }}:</strong></div>
                                <div class="col-md-6">{{ $inventory->title }}</div>
                            </div>
                        </li>
                    @endif
                    @if(!empty($inventory->year))
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.year') }}:</strong></div>
                                <div class="col-md-6">{{ $inventory->year }}</div>
                            </div>
                        </li>
                    @endif
                    @if(!empty($inventory->category->name))
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.category') }}:</strong></div>
                                <div class="col-md-6">{{ $inventory->category->name ?? '' }}</div>
                            </div>
                        </li>
                    @endif
                    @if(!empty($inventory->price))
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.price') }}:</strong></div>
                                <div class="col-md-6">{{ $inventory->price }}</div>
                            </div>
                        </li>
                    @endif
                    <div id="more-details" style="display: none;">
                        @if(!empty($inventory->make))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.make') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->make }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->vehicle_model))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.vehicle_model') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->vehicle_model }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->body))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.body') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->body }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->capacity))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.capacity') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->capacity }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->engine))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.engine') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->engine }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->fuel_type))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.fuel_type') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->fuel_type }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->brakes))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.brakes') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->brakes }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->mileage))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.mileage') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->mileage }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->air_conditioning))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.air_conditioning') }}:</strong></div>
                                    <div class="col-md-6">{{ App\Models\Inventory::AIR_CONDITIONING_SELECT[$inventory->air_conditioning] ?? '' }}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->additional_information))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.additional_information') }}:</strong></div>
                                    <div class="col-md-6">{!! $inventory->additional_information !!}</div>
                                </div>
                            </li>
                        @endif
                        @if(!empty($inventory->attachment))
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-md-6"><strong>{{ trans('cruds.inventory.fields.attachment') }}:</strong></div>
                                    <div class="col-md-6">{{ $inventory->attachment }}</div>
                                </div>
                            </li>
                        @endif
                    </div>
                </ul>
                <br>
               <p> <a href="javascript:void(0);" id="toggle-details">Show More</a></p>

               <p><!-- Button trigger modal -->
<a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="#inquiryModal">
    <strong>Request a Quote</strong>
</a></p>

                <script>
                    document.getElementById('toggle-details').addEventListener('click', function() {
                        var moreDetails = document.getElementById('more-details');
                        if (moreDetails.style.display === 'none') {
                            moreDetails.style.display = 'block';
                            this.textContent = 'Show Less';
                        } else {
                            moreDetails.style.display = 'none';
                            this.textContent = 'Show More';
                        }
                    });
                </script>




<!-- Modal -->

                <form method="POST" action="{{ route("frontend.inquiries.store") }}" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label class="required" for="first_name">{{ trans('cruds.inquiry.fields.first_name') }}</label>
                        <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                        @if($errors->has('first_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('first_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.inquiry.fields.first_name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="last_name">{{ trans('cruds.inquiry.fields.last_name') }}</label>
                        <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name', '') }}" required>
                        @if($errors->has('last_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('last_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.inquiry.fields.last_name_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="email">{{ trans('cruds.inquiry.fields.email') }}</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}" required>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.inquiry.fields.email_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label class="required" for="phone_number">{{ trans('cruds.inquiry.fields.phone_number') }}</label>
                        <input class="form-control" type="text" name="phone_number" id="phone_number" value="{{ old('phone_number', '') }}" required>
                        @if($errors->has('phone_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('phone_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.inquiry.fields.phone_number_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <label for="comment">{{ trans('cruds.inquiry.fields.comment') }}</label>
                        <textarea class="form-control" name="comment" id="comment">{{ old('comment') }}</textarea>
                        @if($errors->has('comment'))
                            <div class="invalid-feedback">
                                {{ $errors->first('comment') }}
                            </div>
                        @endif
                        <span class="help-block text-muted small">{{ trans('cruds.inquiry.fields.comment_helper') }}</span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="hidden" name="address" id="address" value="">
                        <input type="hidden" name="inventory_id" value="{{ Request::segment(2) }}">
                        <button class="btn btn-danger" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
         

                </div>


         
            </div>
          
            <div class="form-group">
                <a class="btn btn-default" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#carouselExampleControls').carousel();
    });
</script>
@endsection