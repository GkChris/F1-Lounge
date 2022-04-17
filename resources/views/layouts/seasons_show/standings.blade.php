<div class="standings_cont d-flex flex-column">
    <div class="row">
        <div class="small_option_bar">
            <div class="standings_nav_options" id="driver_standings" onclick="changeStandingsNav(this);"><p>Drivers'</p></div>
            <div class="standings_nav_options" id="constructor_standings" onclick="changeStandingsNav(this);"><p>Constructors'</p></div>
        </div>
    </div>

    <div class="row">
        <div class="driver_standings" id="driver_standings_div">
            @include('layouts.seasons_show.drivers_table')
        </div>

        <div class="constructor_standings" id="constructor_standings_div">
            @include('layouts.seasons_show.constructors_table')
        </div>
    </div>
</div>