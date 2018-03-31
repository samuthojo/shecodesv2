<section id="sectionBanner">
    <div class="section-wrapper layout center end-justified">
        <div id="bannerText">
            <p>
                We expose more girls <span class="for-lg"><br></span>
                in Tanzania to STEAM<span class="for-lg"><br></span>
                careers and amplify<span class="for-lg"><br></span>
                their impact first in<span class="for-lg"><br></span>
                Africa and finally<span class="for-lg"><br></span>
                the whole world.<span class="for-lg"><br></span>
            </p>

            <button class="layout center" onclick="loadVideo()">
                {{--<i class="fa fa-play-circle-o"></i>--}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="#FFFFFF" width="34" height="34" viewBox="0 0 24 24"><path d="M10 16.5l6-4.5-6-4.5v9zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"/></svg>&nbsp;
                <span class="thin-text">
                    PLAY VIDEO
                </span>
            </button>
        </div>

        <a href="#sectionAbout" class="for-lg" style="z-index: 1;position: absolute; bottom: 2em; width: 54px; left: 0; right: 0; margin: auto;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#fff" width="54" height="54" viewBox="0 0 24 24"><path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6z"/></svg>
        </a>
    </div>

    <video id="bannerVideo" autoplay muted loop width="100%"></video>

    <div id="loader" class="layout center-center">
        <div></div>
    </div>

    <button id="videoCloser" class="layout center-center" onclick="closeVideo()">
        <svg style="fill: #ffffff !important;width: 28px !important; height: 28px !important;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
    </button>
</section>

<script>
    var wrapper = document.getElementById("sectionBanner");
    var video = document.getElementById("bannerVideo");
    var loaded = false;
    var vid_url = "{{asset('images/coverTrim.mp4')}}";

    function loadVideo(){
        if(!loaded){
            wrapper.classList.add("loading");

            if (video.readyState >= video.HAVE_FUTURE_DATA) {
                loaded = true;
                completeLoad();
            } else {
                video.oncanplaythrough = function() {
                    loaded = true;
                    completeLoad();
                };
                video.src = vid_url;
            }
        }else{
            wrapper.classList.add("video-loaded");
            video.currentTime = 0;
            video.play();
        }
    }

    function closeVideo(){
        wrapper.classList.remove('video-loaded');
        wrapper.classList.remove("loading");
        console.log("Close the video");
        video.pause();
    }

    function completeLoad() {
        wrapper.classList.add("video-loaded");

        setTimeout(function(){
            wrapper.classList.remove("loading");
        },1000);
    }
</script>