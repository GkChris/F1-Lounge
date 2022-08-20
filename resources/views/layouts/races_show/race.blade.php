<div class="race_cont d-flex flex-column">
    <div class="row">
        <div class="small_option_bar">
            <div class="race_nav_options" id="results" onclick="changeRaceNav(this);"><p>Results</p></div>
            @if (count($thisRacePitStops) != '0')
                <div class="race_nav_options" id="pit_stops" onclick="changeRaceNav(this);"><p>Pit stops</p></div>
            @else
                <div class="race_nav_options" id="pit_stops" style="cursor: not-allowed; opacity:0.5;" title="No pit stops data"><p>Pit stops</p></div>
            @endif
            @if ($thisFullResults->sortBy('fastestLapTime')->first()->fastestLapTime != '\N')
                <div class="race_nav_options" id="fastest_laps" onclick="changeRaceNav(this);"><p>Fastest laps</p></div>
            @else
                <div class="race_nav_options" id="fastest_laps" style="cursor: not-allowed; opacity:0.5;" title="No fastest lap data"><p>Fastest laps</p></div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="results" id="results_div">
            @include('layouts.races_show.race.results')
        </div>

        <div class="pit_stops" id="pit_stops_div">
            @include('layouts.races_show.race.pit_stops')
        </div>

        <div class="fastest_laps" id="fastest_laps_div">
            @include('layouts.races_show.race.fastest_laps')
        </div>
    </div>
</div>



