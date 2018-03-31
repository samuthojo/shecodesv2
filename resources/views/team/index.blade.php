@php
    $page = "team";
@endphp

@extends('layouts.app')

@section('title')
    | About
@endsection

@section('styles')
    <link href="{{ asset('css/team.css') }}" rel="stylesheet">
@endsection

@section('content')
    @include('team.banner')
    <div id="teamPage" class="section-wrapper">
        <section id="founder" class="layout">
            <div class="image layout start center-justified">
                <img src="{{asset('images/abella.png')}}" alt="">
            </div>
            <div class="flex">
                <h2>Our Founder</h2>
                <h3>
                    Abella Bateyunga is the founder and C.E.O of She Codes For Change.
                </h3>
                <p id="founderDesc" class="long-description">
                    I decided to take leap and influence young girls to delve into technological innovation for community change and let me just tell you, it was<span> worth every little bit just to see the amount of transformation that happens in these girls' lives. I mean some come here without the littlest clue and when they leave they can create a usable product.
                        If that's not a cause worth backing I don't know what is.</span><span>...<a href="#readMore" onclick="document.getElementById('founderDesc').classList.toggle('full')">read </a></span>
                </p>

                <a href="http://abellabateyunga.com" target="_blank" id="moreAboutFounder">Learn more about Abella</a>
            </div>
        </section>

        <section id="directors">
            <h2>Board of directors</h2>
            <div class="layout wrap list">
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/director1.jpg')}}" alt="">
                    </div>
                    <div class="name">Godfrey Nyombi</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/director2.jpg')}}" alt="">
                    </div>
                    <div class="name">Rose Funja</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/director3.jpg')}}" alt="">
                    </div>
                    <div class="name">Jumanne Mtambalike</div>
                </div>
            </div>
        </section>

        <section id="staff">
            <h2>Our staff</h2>
            <div class="layout wrap list">
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/simon.jpg')}}" alt="">
                    </div>
                    <div class="name">Simon Mutabazi</div>
                    <div class="desc">Project Manager</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/rehema.jpg')}}" alt="">
                    </div>
                    <div class="name">Rehema Mtandika</div>
                    <div class="desc">Hub Manager</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/doreen2.jpg')}}" alt="">
                    </div>
                    <div class="name">Doreen Bateyunga</div>
                    <div class="desc">Logistics Lead</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/mujuni.jpg')}}" alt="">
                    </div>
                    <div class="name">Mujuni Baitan</div>
                    <div class="desc">Logistics</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/eben.png')}}" alt="">
                    </div>
                    <div class="name">Ebenhard Oswald</div>
                    <div class="desc">Logistics</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/leroy.jpg')}}" alt="">
                    </div>
                    <div class="name">Leroy Sanyi</div>
                    <div class="desc">Logistics</div>
                </div>
            </div>
        </section>
    </div>
    @include('team.cta-join')
@endsection