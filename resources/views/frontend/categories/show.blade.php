@extends('layouts.frontend')
@section('content')
@include('frontend.partials.internalhero')
<div class="container mt-5">
    <div class="row justify-content-center">
           
    @include('partials.featuredlistings')

    </div>
</div>
@endsection