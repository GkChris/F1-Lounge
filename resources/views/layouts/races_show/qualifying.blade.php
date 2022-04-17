@if (isset($thisSprintRacePoints))
    <div class="qualifying_cont d-flex flex-column">
        <div class="row">
            <div class="small_option_bar">
                <div class="qualify_nav_options" id="q_q" onclick="changeQualifyNav(this);"><p>Qualifying</p></div>
                <div class="qualify_nav_options" id="q_sr" onclick="changeQualifyNav(this);"><p>Sprint Race</p></div>
            </div>
        </div>

        <div class="row">
            <div class="q_q" id="q_div">
                @include('layouts.races_show.qualifying.normal_qualifying')
            </div>

            <div class="q_sr" id="q_sr_div">
                @include('layouts.races_show.qualifying.sprint_qualifying')
            </div>
        </div>
    </div>
@else
    <div class="qualifying_cont d-flex flex-column">
        <div class="row">
            <div class="q_q" id="q_div">
                @include('layouts.races_show.qualifying.normal_qualifying')
            </div>
        </div>
    </div>
@endif
