<div class="participants_cont d-flex flex-column">
    <div class="row">
        <div class="small_option_bar">
            <div class="small_nav_options" id="driver_participants" onclick="changeSmallNav(this);"><p>Drivers</p></div>
            @if($thisSeason->year > 1957)
            <div class="small_nav_options" id="constructor_participants" onclick="changeSmallNav(this);"><p>Constructors</p></div>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="driver_participants" id="driver_participants_div">
            @include('layouts.seasons_show.driver_participants')
        </div>

        <div class="constructor_participants" id="constructor_participants_div">
            @include('layouts.seasons_show.constructor_participants')
        </div>
    </div>


</div>