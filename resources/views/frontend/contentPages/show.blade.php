@extends('layouts.frontend')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            
        <!--Begin Header Section-->

        <!-- Service 10 - Bootstrap Brain Component -->
        <section class="bg-light py-3 py-md-5 py-xl-8" style="background-image:url('{{ $contentPage->featured_image->getUrl() }}'); background-size:cover; min-height:550px;">
       
        </section>

<div class="container py-5 lead">
    <h2>  {{ $contentPage->title }} </h2>
    @if($contentPage->excerpt)
    {!! $contentPage->excerpt !!}
    @endif
    <p></p>
    @if($contentPage->page_text)
     {!! $contentPage->page_text !!}
    @endif
    <p>
    @foreach($contentPage->tags as $key => $tag)
    <span style="color:white;">{{ $tag->name }}</span>
    @endforeach
    </p>
    <p style="color:white;"> {{ $contentPage->meta_keywords ?? '' }} </p>
    <p style="color:white;"> {{ $contentPage->meta_description ?? '' }} </p>
</div>






@endsection