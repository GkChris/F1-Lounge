<div class="extras_cont d-flex flex-column">
    <div class="row">
        <div class="small_option_bar">
            <div class="extras_nav_options" id="standings" onclick="changeExtrasNav(this);"><p>Standings</p></div>
            <div class="extras_nav_options" id="participants" onclick="changeExtrasNav(this);"><p>Participants</p></div>
            <div class="extras_nav_options" id="circuit" onclick="changeExtrasNav(this);"><p>Circuit</p></div>
        </div>
    </div>

    <div class="row">
        <div class="standings" id="standings_div">
            @include('layouts.races_show.extras.standings')
        </div>

        <div class="participants" id="participants_div">
            @include('layouts.races_show.extras.participants')
        </div>

        <div class="circuit" id="circuit_div">
            @include('layouts.races_show.extras.circuit')
        </div>

    </div>
</div>
