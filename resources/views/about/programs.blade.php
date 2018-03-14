<section id="sectionPrograms">
    <h1>Our Programs</h1>
    <div class="section-wrapper">
        <div class="time-line layout">
            @foreach($months as $month)
                <div class="month flex layout center-center {{in_array($loop->index, $active_months) ? "active" : ""}}">{{substr($month, 0, 3)}}</div>
            @endforeach
        </div>

        <div class="programs">
            <div class="program" data-when="2">
                <h1>Girls In ICT</h1>
                <p>She Codes for Change (SCC) initiative seeks to nurture young girls to develop interest in Science, Technology, Engineering, Arts/Design and Mathematics (STEAM) careers at early stage of their careers choices through basic coding skills.
                    <br/> <a href="#">Learn more</a>
                </p>
            </div>
            <div class="program" data-when="5,6">
                <h1>Summer Camp</h1>
                <p>She Codes for Change (SCC) initiative seeks to nurture young girls to develop interest in Science, Technology, Engineering, Arts/Design and Mathematics (STEAM) careers at early stage of their careers choices through basic coding skills.
                    <br/><a href="#">Learn more</a>
                </p>
            </div>
            <div class="program" data-when="10,11">
                <h1>Holiday Program</h1>
                <p>She Codes for Change (SCC) initiative seeks to nurture young girls to develop interest in Science, Technology, Engineering, Arts/Design and Mathematics (STEAM) careers at early stage of their careers choices through basic coding skills.
                    <br/> <a href="#">Learn more</a>
                </p>
            </div>
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