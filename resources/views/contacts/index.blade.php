@php
    $colored_logo = true;
    $page = "contacts";
@endphp

@extends('layouts.app')

@section('title')
    | About
@endsection

@section('styles')
    <link href="{{ asset('css/contacts.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="contactsPage">
        <div id="theMap"></div>

        <div id="mobContactsWrapper">
            <div class="mobContactCard" style="margin-top: -80px; margin-bottom: 30px;">
                <div class="layout">
                    <div style="padding: 12px 18px; padding-left: 0; font-size: 25px">
                        <i class="fa fa-location-arrow"></i>
                    </div>
                    <div style="line-height: 1.5em; font-size: 18px">
                        <span style="font-family: 'Bold', sans-serif">Head Quarters</span><br>
                        Afya House Building, <br>
                        Plot NO. 47 Mikocheni.
                    </div>
                </div>

                <div class="layout" style="margin-top: 16px;">
                    <div style="padding: 12px 18px; padding-left: 0; font-size: 25px">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div style="line-height: 1.5em; font-size: 18px">
                        <span style="font-family: 'Bold', sans-serif">Give us a call</span><br>
                        +255783352134<br>
                        +255715351174
                    </div>
                </div>
            </div>

            <div class="mobContactCard" style="padding: 20px 10px; box-shadow: none; background-color: transparent;">
                <form action="#" style="margin-top: 12px;">
                    <h1 style="font-family: 'Bold', sans-serif; font-size: 22px">Write to us</h1>
                    <div class="input-group" style="margin-top: 40px;">
                        <input type="text" name="full_name">
                        <label>NAME</label>
                    </div>
                    <sppan style="width: 20px;"></sppan>
                    <div class="input-group">
                        <input type="text" name="email">
                        <label for="">EMAIL</label>
                    </div>
                    <div class="input-group" style="margin-bottom: 16px;">
                        <textarea name="message" id="" rows="3"></textarea>
                        <label>YOUR MESSAGE</label>
                    </div>

                    <button class="submit-btn">SUBMIT MESSAGE</button>
                </form>
            </div>
        </div>

        <div id="rotatedBg">
            <div class="image" style="background-image: url({{asset('images/scgirls.jpg')}});"></div>
            <div class="scrim"></div>
        </div>
        <div id="contactWrapper" class="layout">
            <div id="coolForm" class="show-chat">
                <div class="toggler layout vertical center-justified">
                    <button class="for-chat" onclick="setCurSection(event, 'chat')">
                        <span class="back-text">C<br>H<br>A<br>T</span>
                    </button>
                    <button class="for-contact" onclick="setCurSection(event, 'contacts')">
                        <span class="back-text">V<br>I<br>S<br>I<br>T</span>
                    </button>
                </div>
                <div id="contactBox">
                    <div id="contactsSub">
                        <div class="sub-content">
                            <div id="socialLinks" class="layout wrap">
                                <a href="http://www.facebook.com/SHE-Codes-For-Change-1022018851231323/?fref=ts" class="social-link">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="http://twitter.com/SheCodes4TZ" class="social-link">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="http://www.instagram.com/shecodes4tz/" class="social-link">
                                    <i class="fa fa-instagram"></i>
                                </a>
                                <a href="http://www.youtube.com/channel/UCMUBgmqGInEuweRA4qCxw6A" class="social-link">
                                    <i class="fa fa-youtube-play"></i>
                                </a>
                            </div>
                            <h1>
                                <i class="fa fa-map-marker"></i>
                                <span>
                                    Come Visit
                                </span>
                            </h1>

                            <span id="address">
                                Tanzania Bora Initiative,<br>
                                Afya House Building,<br>
                                Plot NO. 47 Mlalakua Road<br>
                                Mikocheni,Dar es salaam, Tanzania.<br>
                                P.O.Box 33521.
                            </span>
                        </div>
                    </div>
                    <div id="chatSub">
                        <div class="sub-content">
                            <div id="socialLinks" class="layout wrap">
                                <a href="http://www.facebook.com/SHE-Codes-For-Change-1022018851231323/?fref=ts" class="social-link">
                                    info@shecodesforchange.org
                                </a>
                            </div>
                            <h1>
                                <i class="fa fa-envelope"></i>
                                <span>
                                    Let's Chat
                                </span>
                            </h1>

                            <form action="#" id="chatForm">
                                <div class="layout">
                                    <div class="input-group">
                                        <input type="text" name="full_name">
                                        <label>NAME</label>
                                    </div>
                                    <sppan style="width: 20px;"></sppan>
                                    <div class="input-group">
                                        <input type="text" name="email">
                                        <label for="">EMAIL</label>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <textarea name="message" id="" rows="3"></textarea>
                                    <label>YOUR MESSAGE</label>
                                </div>

                                <button class="submit-btn">SUBMIT MESSAGE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script async defer
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClGUi2nojUCAB1c-N1EJqkiBLId1hzx_s&callback=initMap">
    </script>

    <script>
        function setCurSection(event, section){
            var ripple = $("#"+section+"Sub");
//                .find('.ripple');
            ripple.addClass('roll-it');
            setTimeout(function () {
                ripple.removeClass('roll-it');
            }, 230);

            $("#coolForm")
                .removeClass('show-contacts show-chat')
                .addClass('show-' + section);
        }

        function initMap() {
            var opt = { minZoom: 17, maxZoom: 17, type: 'satellite', mapTypeControl: false };

            var map1 = new google.maps.Map(document.getElementById('theMap'), {
                zoom: 17,
                center: {lat: -6.7561356, lng: 39.2468857}
            });

            map1.setOptions(opt);

            var image = 'images/marker.png';

            var marker = new google.maps.Marker({
                position: {lat: -6.7561356, lng: 39.2468857},
                map: map1,
                icon: image
            });
        }
    </script>
@endsection