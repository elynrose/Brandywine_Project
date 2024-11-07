<!---Featured Listings---->
@php
$page = Request::segment(1);
$category_id = Request::segment(2);
if($page == "home" || $page == ""){
    $inventories = \App\Models\Inventory::with('category')->where('featured', 1)->take(3)->get();
} elseif($page == "categories"){
    $inventories = \App\Models\Inventory::with('category')->where('category_id', $category_id)->paginate(2);
}
elseif($page == "inventories"){
    $inventories = \App\Models\Inventory::with('category')->paginate(12);
}
@endphp

@if($inventories->count() > 0)
<section class="py-3 py-md-5">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        @if($page == "home" || $page == "")
        <h2 class="mb-4 display-5 text-center">Featured Inventory</h2>
        @elseif($page == "inventories")
        <h2 class="mb-4 display-5 text-center">Inventory</h2>
        @elseif($page == "categories")
        @endif
        <p class="text-secondary mb-5 text-center lead fs-4">
            Discover our top picks from our extensive inventory. These featured buses are selected for their exceptional quality, reliability, and value.
        </p>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <div class="container overflow-hidden">
    <div class="row gy-4 gy-xxl-5">
        @foreach($inventories as $inventory)
      <div class="col-12 col-md-6 col-lg-4 d-flex mb-4">
        <article class="d-flex">
          <div class="card border border-dark" style="--bs-card-border-radius: 0; --bs-card-inner-border-radius: 0;">
            <figure class="card-img-top m-0 overflow-hidden bsb-overlay-hover">
              <a href="">
              @if($inventory->featured_image)
                                <a href="{{ route('frontend.inventories.show', $inventory->id) }}"  style="display: inline-block">
                                    <img src="{{ $inventory->featured_image->getUrl() }}" loading="lazy" width="100%" class="img-fluid">
                                </a>
                            @endif              </a>

            </figure>
            <div class="card-body border-0 bg-white p-4">
              <div class="entry-header mb-3">
                <h5 class="card-title entry-title h4 mb-0">
                  <a class="link-dark link-opacity-100 link-opacity-75-hover text-decoration-none" href="{{ route('frontend.inventories.show', $inventory->id) }}">{{ $inventory->title }}</a>
                </h5>
               <p class="text-muted"> @if($inventory->year)<strong>Year:</strong> {{ $inventory->year }} @endif
               @if($inventory->make) <strong>Make:</strong> {{ $inventory->make }} @endif
               @if($inventory->vehicle_model) <strong>Model:</strong> {{ $inventory->vehicle_model }} @endif</p>

              </div>
            </div>
          </div>
        </article>
      </div>
    @endforeach
    
    </div>
        </article>
      </div>
    </div>
  </div>


  @if($page == "home" || $page == "")
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12 text-center">
            <a class="btn btn-warning" href="{{ route('frontend.inventories.index') }}">
               <strong> View More Inventory </strong>
            </a>
        </div>
    </div>
</div>
@elseif($page == "categories")
<div class="container">
        <div class="col-lg-12 text-center">
<div class="d-flex justify-content-center">
    {{ $inventories->links('pagination::bootstrap-4') }}
</div>
</div>
</div>
@elseif($page == "inventories")
<div class="container">
        <div class="col-lg-12 text-center">
<div class="d-flex justify-content-center">
    {{ $inventories->links('pagination::bootstrap-4') }}
</div>
</div>
</div>
@endif

</section>


@else
<h3 class="text-center py-5">No inventory available in this section</h3>
@endif