@extends('layouts.frontend')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
           
        <!--Begin Header Section-->

        <!-- Service 10 - Bootstrap Brain Component -->
        <section class="bg-light py-3 py-md-5 py-xl-8" style="background-image:url('{{ asset("/images/BWLLC-Bus-Sales.png") }}'); background-size:cover;">
            <div class="container hero">
                <div class="row justify-content-md-center" style="position:relative;">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 inner-center">
                        <h1 class="mb-4 display-5 text-center">We are exceptional</h1>
                        <p class="text-secondary mb-5 text-center lead fs-4 intro">
                            At Brandywine Bus Sales, our unwavering commitment is to deliver an exceptional bus ownership experience for schools and transportation services across the vibrant state of Pennsylvania.
                        </p>
                        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="container-fluid">
                            <div class="row gy-3 gy-md-4">
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="card border-dark card-black">
                                        <div class="card-body p-3 p-md-4 p-xxl-5 d-flex justify-content-center align-items-center">
                                            <div class="px-3 text-primary">
                                                <i class="fas fa-bus fa-3x"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-1">Diverse Inventory</h4>
                                                <p class="m-0 text-secondary">Explore our wide range of buses to find the perfect fit for your needs.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="card border-dark card-black">
                                        <div class="card-body p-3 p-md-4 p-xxl-5 d-flex justify-content-center align-items-center">
                                            <div class="px-3 text-primary">
                                                <i class="fas fa-phone fa-3x"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-1">Dedicated Service</h4>
                                                <p class="m-0 text-secondary">Our team is always ready to assist you with personalized support and expert advice.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-4 mb-3">
                                    <div class="card border-dark card-black">
                                        <div class="card-body p-3 p-md-4 p-xxl-5 d-flex justify-content-center align-items-center">
                                            <div class="px-3 text-primary">
                                                <i class="fas fa-handshake fa-3x"></i>
                                            </div>
                                            <div>
                                                <h4 class="mb-1">Our Promise</h4>
                                                <p class="m-0 text-secondary">Our focus is on safety, reliability, and quality service.</p>
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

        <!--End Header Section-->
        <span class="row py-5"></span>
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="text-center mb-3">Providing Quality School Buses Across Pennsylvania</h2>
                    <p class="text-center lead">
                        At Brandywine Bus Sales, we don't just sell buses; we build partnerships. <br>Our team of experienced professionals works closely with schools and transportation companies <br>to understand their specific requirements.
                    </p>
                    <p class="text-center lead">
                        <a class="btn btn-warning" href="/content-pages/1"><strong>Learn more</strong></a>
                    </p>
                </div>
            </div>
            <span class="row py-3"></span>
            <div class="row py-5">
                <div class="col-md-6 yellow-bg mb-5">
                    <div class="inner-centered">
                        <h3>Trusted Partners</h3>
                        <h4><strong>Brandywine Bus Sales</strong> is proud to support schools and communities in their transportation needs. Let us help you drive your future forward with the right bus solution.</h4>
                    </div>
                </div>
@php
$categories = \App\Models\Category::all();    
@endphp
                <div class="col-md-6">
                    <h3 class="text-center mb-4">Browse our inventory</h3>
                    <div class="justify-content-center">
                        <div class="list-group">
                            @foreach($categories as $category)

                            <!--Count items listed in each category-->
                            @php
                            $count = \App\Models\Inventory::where('category_id', $category->id)->count();
                            @endphp
                            <a href="{{ route('frontend.categories.show', $category->id) }}" class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                                <div class="d-flex gap-2 w-100 justify-content-between">
                                    <div>
                                        <h6 class="mb-0">{{ $category->name ?? '' }}</h6>
                                        <p class="mb-0 opacity-75">Browse our available lists of {{ $category->name ?? '' }}</p>
                                    </div>
                                    <small class="opacity-50 text-nowrap">{{ $count ?? 0 }}</small>
                                </div>
                            </a>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>


@include('partials.featuredlistings')
            <!--End Featured Listings-->
            
        </div>

    </div>
@endsection

@section('scripts')
@parent
@endsection