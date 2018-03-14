@extends('layouts.app')

@section('title')
    | About
@endsection

@section('styles')
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('about.banner')
    @include('about.gap')
    @include('about.programs')
    @include('about.alumni')
    @include('about.cta-join')
@endsection