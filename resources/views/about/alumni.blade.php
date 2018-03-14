<section id="sectionAlumni">
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


<script>
    function highlightMonths(hovered, eqs) {
        $.each(eqs, function(i, v) {
            if(hovered)
                $('.month').eq(v).addClass('hovered');
            else
                $('.month').eq(v).removeClass('hovered');
        });
    }

    $('.program').on('mouseover', function(){
        highlightMonths(true, getTargetMonths($(this).data('when')));
    })
        .on('mouseleave', function(){
            highlightMonths(false, getTargetMonths($(this).data('when')));
        });

    function getTargetMonths(str){
        var month_array = [];
        month_array.push(str);
        return isFinite(str) ? month_array : str.split(",");
    }

</script>