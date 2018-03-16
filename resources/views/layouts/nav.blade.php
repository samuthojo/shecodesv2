<div id="mainNav" class="for-lg">
    <div class="section-wrapper layout center justified">
        <a href="{{url('/')}}" id="logo">
            @if(isset($colored_logo))
                <img src="{{asset('images/pink_logo.png')}}" alt="">
            @else
                <img src="{{asset('images/white_logo.png')}}" alt="">
            @endif
        </a>

        <div class="layout center">
            <nav>
                <a href="{{url('/about')}}" class="{{$page == 'about' ? 'active' : ''}}">ABOUT US</a>
                <a href="{{url('/programs')}}" class="{{$page == 'programs' ? 'active' : ''}}">PROGRAMS</a>
                {{--<a href="{{url('/')}}" class="{{$page == 'media' ? 'active' : ''}}">MEDIA</a>--}}
                <a href="{{url('/team')}}" class="{{$page == 'team' ? 'active' : ''}}">TEAM</a>
                <a href="{{url('/contacts')}}" class="{{$page == 'contacts' ? 'active' : ''}}">CONTACT US</a>
            </nav>

            <div id="socials">
                {{--<a href="#" target="_blank"><i class="fa fa-facebook"></i></a>--}}
                {{--<a href="#" target="_blank"><i class="fa fa-instagram"></i></a>--}}
                {{--<a href="#" target="_blank"><i class="fa fa-envelope"></i></a>--}}
                <a target="_blank" href="http://www.facebook.com/SHE-Codes-For-Change-1022018851231323/?fref=ts">
                    <i class="fa fa-facebook"></i>
                </a>
                <a target="_blank" href="http://twitter.com/SheCodes4TZ">
                    <i class="fa fa-twitter"></i>
                </a>
                <a target="_blank" href="http://www.instagram.com/shecodes4tz/">
                    <i class="fa fa-instagram"></i>
                </a>
                {{--<a target="_blank" href="http://www.youtube.com/channel/UCMUBgmqGInEuweRA4qCxw6A">--}}
                    {{--<i class="fa fa-youtube-play"></i>--}}
                {{--</a>--}}
            </div>
        </div>
    </div>
</div>

<div id="mobNavigation" class="for-mob">
    <div id="mobNavBg" onclick="toggleMenu()"></div>
    <div id="mobNavLogo" class="layout center justified">
        <a href="http://shecodes.loveartstanzania.com">
            <img src="{{asset('images/pink_logo.png')}}">
        </a>

        <a href="#openMenu" onclick="toggleMenu()">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <div id="mobNavLinks">
        <a href="{{url('/')}}" >Home</a>
        <a href="{{url('about')}}" >About</a>
        <div class="a-dropdown">
            <label for="programs-drop">Programs <i class="fa fa-caret-down"></i></label>
            <input type="checkbox" id="programs-drop"/>
            <ul class="a-dropdown-content">
                <li><a href="{{url('programs/Girls-in-ICT')}}">Girls In ICT</a></li>
                <li><a href="{{url('programs/Summer-Camp')}}">Summer Camp</a></li>
                <li><a href="{{url('programs/Holiday-Camp')}}">Holiday Camp</a></li>
                <li><a href="{{url('programs/Binti-Hub')}}">Binti Hub</a></li>
            </ul>
        </div>
        <a href="{{url('team')}}" >Team</a>
        <a href="https://medium.com/@shecodesforchange" target="_blank">Blog</a>
        <a href="{{url('contacts')}}">Contact Us</a>
    </div>
</div>

<script>
    function toggleMenu(){
        var mobNav = document.getElementById("mobNavigation");

        if(!mobNav.classList.contains("open")){
            mobNav.classList.add("open");

            if(doc_ready){
                TweenMax.from("#mobNavBg", 0.1, {y: -60+"%", opacity: 0, ease: Linear.easeOut});
                TweenMax.staggerFrom("#mobNavLinks > a, #mobNavLinks > div", 0.1, {opacity: 0, y: -20+"%", ease: Linear.easeOut}, 0.04);
            }
        }
        else mobNav.classList.remove("open");
    }
</script>