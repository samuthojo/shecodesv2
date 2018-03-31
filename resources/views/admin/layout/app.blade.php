<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <link rel="manifest" href="{{asset('manifest.json')}}">

    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-starturl" content="/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="theme-color" content="#ce1e55">
    <meta name="keywords" content="Tanzania steam">
    <meta name="description" content="Girls who code platform.">
    <meta name="author" content="iPF Softwares ">
    <meta charset="UTF-8">
    <link href="{{asset('images/fav.png')}}" rel="shortcut icon" type="image">
    <title>Shecodes @yield('page')</title>

    <!-- Styles -->
    <link href="{{asset('css/reset.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/flex.css')}}" rel="stylesheet">

    <link href="{{asset('css/styles.css')}}" rel="stylesheet">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{asset('js/lib/jquery-3.1.0.min.js')}}"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'base_url' => url('/'),
            'asset_url' => asset('images/')
        ]) !!};
    </script>

    <style>
        @media screen and (min-width: 681px){
            .for-mob{
                display: none !important;
            }
        }

        @media screen and (max-width: 680px){
            .for-lg{
                display: none !important;
            }
        }

        #alertMessage{
            position: fixed;
            top: 60px;
            right: 30px;
            padding: 16px 20px;
            border-radius: 3px;
            box-shadow: -2px 2px 12px rgba(0,0,0,0.3);
            background: #fefe03;
            color: #451f75;
            z-index: 99;
            max-width: 250px;
            line-height:23px;
            animation-duration: 0.35s;
        }

        #alertMessage i{
            display: inline-block;
            margin-right: 5px;
        }

        #alertMessage.slideOutUp{
            animation-duration: 0.05s;
        }

        #alertMessage:not(.slideInDown){
            opacity: 0;
            pointer-events: none;
        }
    </style>

    @yield('styles')
</head>
<body>
    <div id="alertMessage" class="animated">
        <i class="fa fa-check-circle"></i>
        <span id="alertMessageText">
                Thankyou, we have received your message.
            </span>
    </div>

    @include('admin.layout.nav')

    <main>
        @yield('content')
    </main>

    @yield('scripts')

    <script>
        var alertMessage = document.getElementById("alertMessage");
        var alertMessageText = document.getElementById("alertMessageText");
        var alert_timeout = null;

        function showMessage(message){
            if(alert_timeout !== null){
                closeMessage(message);
                return;
            }

            alertMessageText.innerText = message;
            alertMessage.classList.add("slideInDown");
            alert_timeout = setTimeout(function () {
                alertMessage.classList.add("slideOutUp");

                setTimeout(function (){
                    alertMessage.classList.remove("slideInDown");
                    alertMessage.classList.remove("slideOutUp");
                    alert_timeout = null;
                }, 300);
            }, 3200);
        }

        function closeMessage(message){
            clearTimeout(alert_timeout);
            alertMessage.classList.remove("slideInDown");
            alertMessage.classList.add("slideOutUp");

            if(message && message.length){
                setTimeout(function (){
                    alertMessage.classList.remove("slideOutUp");
                    alert_timeout = null;
                    showMessage(message);
                }, 100);
            }else{
                setTimeout(function (){
                    alertMessage.classList.remove("slideOutUp");
                    alert_timeout = null;
                }, 300);
            }
        }

        $('a[href*="#"]')
        // Remove links that don't actually link to anything
            .not('[href="#"]')
            .not('[href="#0"]')
            .click(function(event) {
                // On-page links
                if (
                    location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '')
                    &&
                    location.hostname === this.hostname
                ) {
                    // Figure out element to scroll to
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    // Does a scroll target exist?
                    if (target.length) {
                        // Only prevent default if animation is actually gonna happen
                        event.preventDefault();
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 1000, function() {
                            // Callback after animation
                            // Must change focus!
                            var $target = $(target);
                            $target.focus();
                            if ($target.is(":focus")) { // Checking if the target was focused
                                return false;
                            } else {
                                $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
                                $target.focus(); // Set focus again
                            };
                        });
                    }
                }
            });

    </script>
</body>
</html>