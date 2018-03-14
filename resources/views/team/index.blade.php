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

                <a href="#" id="moreAboutFounder">Learn more about Abella</a>
            </div>
        </section>

        <section id="directors">
            <h2>Board of directors</h2>
            <div class="layout wrap list">
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/director1.jpg')}}" alt="">
                    </div>
                    <div class="name">Mr/s Director</div>
                    <div class="desc">This right here is one of our awesome directors.</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/director2.jpg')}}" alt="">
                    </div>
                    <div class="name">Mr/s Director</div>
                    <div class="desc">This right here is one of our awesome directors.</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/director3.jpg')}}" alt="">
                    </div>
                    <div class="name">Mr/s Director</div>
                    <div class="desc">This right here is one of our awesome directors.</div>
                </div>
            </div>
        </section>

        <section id="staff">
            <h2>Our staff</h2>
            <div class="layout wrap list">
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/staffer1.jpg')}}" alt="">
                    </div>
                    <div class="name">Jane Doe</div>
                    <div class="desc">Jane here is one of the staffers ya'll.</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/staffer2.jpg')}}" alt="">
                    </div>
                    <div class="name">Jane Doe</div>
                    <div class="desc">Jane here is one of the staffers ya'll.</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/staffer3.jpg')}}" alt="">
                    </div>
                    <div class="name">Jane Doe</div>
                    <div class="desc">Jane here is one of the staffers ya'll.</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/staffer1.jpg')}}" alt="">
                    </div>
                    <div class="name">Jane Doe</div>
                    <div class="desc">Jane here is one of the staffers ya'll.</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/staffer2.jpg')}}" alt="">
                    </div>
                    <div class="name">Jane Doe</div>
                    <div class="desc">Jane here is one of the staffers ya'll.</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/staffer3.jpg')}}" alt="">
                    </div>
                    <div class="name">Jane Doe</div>
                    <div class="desc">Jane here is one of the staffers ya'll.</div>
                </div>
                <div class="item">
                    <div class="image">
                        <img src="{{asset('images/staffer1.jpg')}}" alt="">
                    </div>
                    <div class="name">Jane Doe</div>
                    <div class="desc">Jane here is one of the staffers ya'll.</div>
                </div>
            </div>
        </section>
    </div>
    @include('team.cta-join')
@endsection