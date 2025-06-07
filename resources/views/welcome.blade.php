@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <!-- home section start -->
    @include('home.carousel')
    <!-- Home Section End -->

    <!-- Category Section Start -->
    @include('home.faq')
    <!-- Category Section End -->

    <!-- Banner Section Start -->
    @include('home.values')
    <!-- Banner Section End -->

    <!-- Value Section Start -->
    @include('home.join_us')
    <!-- Value Section End -->

    <!-- Product Section Start -->
    @include('home.services')
    <!-- Product Section End -->

    <!-- Value Section Start -->
    @include('home.why_choose_us')
    <!-- Value Section End -->

        <!-- Value Section Start -->
    @include('home.ferre_experto')
    <!-- Value Section End -->

    <!-- Newsletter Section Start -->
    @include('home.recent_projects')
    <!-- Newsletter Section End -->

@endsection
