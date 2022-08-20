<div class="podium_overview">

    <div class="row podium_info">


        <div class="drivers_podium">


            @if ($agent->isDesktop())
                @foreach ($thisFullResults->sortBy('position') as $driver)
                    @if ($driver->position == '1')
                        @continue
                    @endif
                    <div class="col-xl-4 d-flex justify-content-center">
                        <div class="testo" id="place_{{ $driver->positionText }}">
                            <a href="/constructors/{{ $driver->driverRef }}"><div class="testo_content text-center">
                                <p>2nd</p>
                                <h5><i>{{ $driver->forename }}</i> {{ $driver->surname }}</h5>
                                <img src="/images/jpg/drivers/{{ $driver->driverRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                            </div></a>
                        </div>
                    </div>
                    @if ($driver->position == '2')
                        @break
                    @endif
                @endforeach
            @endif  


            @foreach ($thisFullResults->sortBy('position') as $driver)
            @if ($agent->isDesktop())
                @if ($driver->position == '2')
                    @continue
                @endif
            @endif
                <div class="col-xl-4 d-flex justify-content-center">
                    <div class="testo" id="place_{{ $driver->positionText }}">
                        <a href="/constructors/{{ $driver->driverRef }}"><div class="testo_content text-center">
                            <p>
                                @if ($driver->positionText == '1')
                                    1st
                                @elseif ($driver->positionText == '2')
                                    2nd
                                @else
                                    3rd
                                @endif
                            </p>
                            <h5><i>{{ $driver->forename }}</i> {{ $driver->surname }}</h5>
                            <img src="/images/jpg/drivers/{{ $driver->driverRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                        </div></a>
                    </div>
                </div>
                @if ($driver->position == '3')
                    @break
                @endif
            @endforeach

        </div>


        <div class="constructor_winner">
            @foreach ($thisFullResults->sortBy('position') as $team)
            @if ($loop->first)
                <div class="col-xl-10 d-flex justify-content-center">
                    <div class="testo">
                        <a href="/constructors/{{ $team->constructorRef }}"><div class="testo_content text-center">
                            <p>Winner's constructor</p>
                            <h5>{{ $team->name }}</h5>
                            <img src="/images/jpg/champion_constructors/{{ $team->constructorRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                        </div></a>
                    </div>
                </div>
            @endif
            @endforeach
        </div>

        

        
    </div>




</div>




<div class="row" id="for_info_p">
    <div class=".col-xl-12 gp_info border rounded">
        <div class="p_cont">
            <p>Season: <strong>{{ $thisRace->year }}</strong></p>
            <p>Round: <strong>{{ $thisRace->round }}</strong></p>
            <p>Date: <strong>{{ $thisRace->date }}</strong></p>
            <p>Circuit: <strong>{{ $thisCircuit->name }}</strong></p>
            <p>Race laps: <strong>{{ $thisFullResults->first()->laps }}</strong></p>
            <p>Winner (Driver): <strong>{{ $thisFullResults->first()->forename }} {{ $thisFullResults->first()->surname }}</strong></p>
            <p>Winner (Constructor): <strong>{{ $thisFullResults->first()->name }}</strong></p>
            @if (isset($thisFullQualifying->first()->forename))
                <p>Pole position: <strong>{{ $thisFullQualifying->first()->forename }} {{ $thisFullQualifying->first()->surname }}</strong></p>
                <p>Pole position time: <strong>{{ $thisFullQualifying->first()->q3 }}</strong></p>
            @endif
            @if ($thisFullResults->sortBy('fastestLapTime')->first()->fastestLapTime != '\N')
                <p>Fastest lap: <strong>{{ $thisFullResults->sortBy('fastestLapTime')->first()->fastestLapTime }}</strong></p>
            @endif
            @if (count($thisRacePitStops) != '0')
                <p>Number of pit stops: <strong>{{ count($thisRacePitStops) }}</strong></p>
            @endif
            <p>Drivers participated: <strong>{{ count($thisFullResults) }}</strong></p>
            <p>Teams participated: <strong>{{ count($thisConstructorParticipants) }}</strong></p>
            <p>Points system: <strong>{{ $thisPointSystem[0]->pointsSystem }}</strong></p>
            @isset($thisSprintRacePoints)
                <p>Sprint Race Points: <strong>{{ $thisSprintRacePoints }}</strong></p>
            @endisset
            @isset($thisFastestLapPoints)
                <p>Fastest Lap Points: <strong>{{ $thisFastestLapPoints }}</strong></p>
            @endisset
        </div>
        <div class="descript_cont">
            <h3>Description</h3>
            @isset($thisRaceDescriptions[0]->description)
            <p>{{ $thisRaceDescriptions[0]->description }}</p>
            @endisset   
            @isset($thisRaceDescriptions[0]->source)
                <p id="source">Description source:&nbsp;&nbsp;<a href="//{{ $thisRaceDescriptions[0]->sourceURL }}" target="_blank">{{ $thisRaceDescriptions[0]->source }}</a></p>   
            @endisset
        </div>
    </div>

</div>



