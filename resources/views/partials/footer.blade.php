<!-- Footer 7 - Bootstrap Brain Component -->
<footer class="footer">

  <!-- Widgets - Bootstrap Brain Component -->
  <section class="py-4 py-md-5">
    <div class="container overflow-hidden">
      <div class="row">
        <div class="col-12">
          <div class="container-fluid border border-dark">
            <div class="row">
              <div class="col-xs-12 col-lg-4">
                <div class="widget p-3 p-md-4 p-xxl-5">
                  <h4 class="widget-title mb-4">Get in Touch</h4>
                  <address class="mb-4">287 W Wesner Rd, Reading PA, 19605</address>
                  <p class="mb-1">
                  <i class="fa fa-phone"></i> <a class="link-dark link-offset-1 link-opacity-75 link-opacity-100-hover link-underline-opacity-0 link-underline-opacity-100-hover"  href="tel:+16106418102">(610) 641-8102</a>
                  </p>
                  <p class="mb-0">
                  <i class="fa fa-envelope"></i> <a class="link-dark link-offset-1 link-opacity-75 link-opacity-100-hover link-underline-opacity-0 link-underline-opacity-100-hover" href="mailto:info@BrandywineBus.com">info@BrandywineBus.com</a>
                  </p>
                </div>
              </div>

              <div class="col-xs-12 col-lg-4">
                <div class="widget p-3 p-md-4 p-xxl-5">
                  <h4 class="widget-title mb-4">Area's We Serve</h4>
                  <p class="mb-4">We provide services to the following areas:</p>
                <p>Philadelphia, Pittsburgh, Allentown, Erie, Reading, Scranton, Bethlehem, Lancaster, Harrisburg, York</p>
                </div>
              </div>

              <div class="col-xs-12 col-lg-4">
                <div class="widget p-3 p-md-4 p-xxl-5">
                  <h4 class="widget-title mb-4">Opening Hours</h4>
                  <p class="mb-4">We always aim to provide a welcoming environment to deliver exceptional service.</p>
                  <div>
                    <div class="row mb-1">
                      <div class="col-5 col-xl-4">
                        <span class="fw-bold">Mon - Fri:</span>
                      </div>
                      <div class="col-7 col-xl-8">
                        <span class="text-secondary">9am - 5pm</span>
                      </div>
                    </div>
                    <div class="row mb-1">
                      <div class="col-5 col-xl-4">
                        <span class="fw-bold">Sat:</span>
                      </div>
                      <div class="col-7 col-xl-8">
                        <span class="text-secondary">9am - 2pm</span>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-5 col-xl-4">
                        <span class="fw-bold">Sun:</span>
                      </div>
                      <div class="col-7 col-xl-8">
                        <span class="text-secondary">We're Closed</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Colophon - Bootstrap Brain Component -->
  <div class="pb-4 pb-md-5">
    <div class="container overflow-hidden">
      <div class="row">
        <div class="col">
          <div class="container-fluid border border-dark">
            <div class="row gy-4 gy-lg-0 p-3 p-md-4 p-xxl-5 align-items-md-center">
              <div class="col-xs-12 col-sm-6 col-lg-4 order-0 order-lg-0">
                <div class="footer-logo-wrapper text-center text-sm-start">
                  <a href="#!">
                  <img src="{{ asset('images/brandywine-bus-sales-pennsylvania.png')}}" width="220" alt="Brandywine Bus Sales LLC, Pennsylvania." style="max-width:220px;">
                  </a>
                </div>
              </div>

              <div class="col-xs-12 col-lg-4 order-2 order-lg-1">
                <div class="colophon-wrapper">
                  <div class="credits text-secondary text-center mt-2 fs-8 small">
                   <a href="https://brandywinebus.com/" class="link-secondary text-decoration-none">&copy; 2024. All Rights Reserved. Brandywine Bus Sales, LLC</a>
                  </div>
                </div>
              </div>


              <div class="col-xs-12 col-lg-4 order-2 order-lg-1">
                <ul class="nav nav-pills nav-justified">
                              <li class="nav-link col-sm-12"> <a class="nav-link small" href="{{ route('login') }}">{{ __('Staff Login') }}</a></li>
@guest
@else
                              <li class="nav-link col-sm-12"><a class="nav-link small"  href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
</li>
@endguest
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
</div>
              </div>

              
          </div>
        </div>
      </div>
    </div>
  </div>

</footer>