<section id="sectionAlumni" class="for-lg">
    <div class="section-wrapper">
        <h1>Shecodes Alumni</h1>
        @for($i = 0; $i < 1; $i++)
            <div class="alumni layout justified">
                <div class="text layout vertical justified">
                    <div class="text">
                        <h3>{{$names[$i]}}</h3>
                        <p>{{$descriptions[$i]}}</p>
                    </div>

                    <span>CLASS OF 2015</span>
                </div>

                <div class="dp" style="-webkit-background-size: cover;background-size: cover;background-image: url({{asset('images/alumni'. ($i+1) .'.jpg')}});"></div>
            </div>
        @endfor

        <div class="movers">
            <button href="#" class="active"></button>
            <button href="#"></button>
            <button href="#"></button>
        </div>
    </div>
</section>

<section id="mobAlumni" class="for-mob">
    <div class="section-wrapper">
        <h1>Shecodes Alumni</h1>

        <div id="mobDps" class="layout">
            @for($i = 0; $i < 3; $i++)
                <div class="dp {{$i == 0 ? 'active' : ''}}" style="-webkit-background-size: cover;background-size: cover;background-image: url({{asset('images/alumni'. ($i+1) .'.jpg')}});"></div>
            @endfor
        </div>

        @for($i = 0; $i < 1; $i++)
            <div class="alumni layout justified">
                <div class="text layout vertical justified">
                    <div class="text">
                        <h3>{{$names[$i]}}</h3>
                        <p>{{$descriptions[$i]}}</p>
                    </div>

                    <span>CLASS OF 2015</span>
                </div>
            </div>
        @endfor
    </div>
</section>