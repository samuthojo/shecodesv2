@php
    $colored_logo = true;
    $page = "programs";
@endphp

@extends('layouts.app')

@section('title')
    | About
@endsection

@section('styles')
    <link href="{{ asset('css/programs.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('programs.banner')
    @include('programs.curriculum')
    @include('programs.cta-join')
    @include('programs.activities')
    @include('programs.partners')
@endsection