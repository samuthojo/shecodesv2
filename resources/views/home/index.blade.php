@extends('layouts.app')

@section('title')
    | Home
@endsection

@section('styles')
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('home.banner')
    @include('home.about')
    @include('home.cta-holiday')
    @include('home.updates')
    @include('home.cta-testimonials')
    @include('home.cta-impact')
@endsection