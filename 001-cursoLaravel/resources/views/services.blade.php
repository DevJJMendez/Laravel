@extends('layouts.landing')
@section('title','Services')
@section('content')
    <h1>Our Services</h1>
    @component('components.service-card')
        @slot('imageLink','/med-ia/media-code/800px-Laravel.svg.png')
        @slot('title','Laravel Framework')
        @slot('content','Laravel 10')
    @endcomponent
    @component('components.service-card')
        @slot('imageLink','/med-ia/media-code/800px-Laravel.svg.png')
        @slot('title','Laravel Framework')
        @slot('content','Laravel 8')
    @endcomponent
    @component('components.service-card')
        @slot('imageLink','/med-ia/media-code/800px-Laravel.svg.png')
        @slot('title','Laravel Framework')
        @slot('content','Laravel 7')
    @endcomponent
    @component('components.service-card')
        @slot('imageLink','/med-ia/media-code/800px-Laravel.svg.png')
        @slot('title','Laravel Framework')
        @slot('content','Laravel 5')
    @endcomponent
@endsection