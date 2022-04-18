<div class="row rounded" id="overview_race_info">
    @foreach ($thisRaces->sortBy('round') as $race)
        @if ($thisSeason->currentRound-1 == $race->round)
            <div class="col-xl-5">
                <div class="event_type rounded">
                    <h2>Previous Race</h2>
                    <img class="prev_next_img" src="/images/jpg/circuits/flag/{{ $race->country }}.jpg">
                </div>
                <div class="event_info rounded">
                    <p>GP: <strong>{{ $race->Rname }}</strong></p>
                    <p>Round: {{ $thisSeason->currentRound-1 }}</p>
                    <p>Date: {{ $race->date }}</p>
                    <p style="text-decoration: underline; font-style:italic; border-top: 1px solid white; margin-bottom:.6rem; padding-top:.5rem;"><strong>Podium</strong></p>
                    @foreach ($thisLastGpPodium as $driver)
                        <p><a style="color: silver;" href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></p>
                    @endforeach
            </div>
            @endif
        @endforeach
    </div>



    <div class="col-xl-5">
        @foreach ($thisRaces->sortBy('round') as $race)
            @if ($thisSeason->currentRound == $race->round)
                <div class="event_type rounded">
                    <h2>Next Race</h2>
                    <img class="prev_next_img" src="/images/jpg/circuits/flag/{{ $race->country }}.jpg">
                </div>
                <div class="event_info rounded">
                    <p>GP: <strong>{{ $race->Rname }}</strong></p>
                    <p>Round: {{ $thisSeason->currentRound }}</p>
                    <p>Date:  {{ $race->date }}</p>
                    <p style="text-decoration: underline; font-style:italic; border-top: 1px solid white; margin-bottom:.6rem; padding-top:.5rem;">Countdown</p>
                    <p style="color: silver;">{{ $thisNextGpCountdown }}</p>
                    <p style="text-decoration: underline; font-style:italic; margin-bottom:.6rem; padding-top:.5rem;">Live Weather</p>
                    @if (isset($thisWeatherData))
                        <p style="color: silver;">Weather: {{ $thisWeatherData['Weather'] }}</p>
                        <p style="color: silver;">Temperature: {{ $thisWeatherData['Temperature'] }}</p>
                        <p style="color: silver;">Temperature: {{ $thisWeatherData['Feels Like'] }}</p>
                        <p style="color: silver;">Wind speed: {{ $thisWeatherData['Wind'] }}</p>
                        <p style="color: silver;">Humidity: {{ $thisWeatherData['Humidity'] }}</p>
                        <p style="color: silver;">Cloud percentage: {{ $thisWeatherData['Clouds'] }}</p>
                    @endif 
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="row" id="overview_cont">
    <div class="col-xl-6 d-flex justify-content-center">
        <div class="testo">
            @foreach ($thisFullDriverStandings->sortBy('position') as $champion)
                @if ($loop->first)
                    <a href="/drivers/{{ $champion->driverRef }}"><div class="testo_content text-center">
                        @if($thisSeason->year > 1957)
                        <p>Drivers' Leader</p>
                        @else
                        <p>Champion</p>
                        @endif
                        <h5>{{ $champion->forename }} {{ $champion->surname }}</h5>
                        
                            <img src="/images/jpg/drivers/{{ $champion->driverRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                        
                    </div></a>
                @endif
            @endforeach
        </div>
    </div>
    
    @if($thisSeason->year > 1957)
    <div class="col-xl-6 d-flex justify-content-center">
        <div class="testo">
            @foreach ($thisConstructorStandings->sortBy('position') as $championTeam)
                @if ($loop->first)
                    <a href="/constructors/{{ $championTeam->constructorRef }}"><div class="testo_content text-center">
                        <p>Constructors' Leader</p>
                        <h5>{{ $championTeam->name }}</h5>
                        
                            <img id="con_img" src="/images/jpg/constructors/{{ $championTeam->constructorRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                            <p>{{ $championTeam->constructorRef }}</p>
                    </div></a>
                @endif
            @endforeach
        </div>
    </div>
    @endif
</div>




<div class="row" id="for_info_p">
    <div class=".col-xl-12 gp_info border rounded">
        <div class="p_cont">
            <p>Season: <strong>{{ $thisSeason->year }}</strong></p>
            @foreach ($thisFullDriverStandings->sortBy('position') as $leader)
                @if ($loop->first)
                    <p>Leader (Driver): <strong>{{ $leader->forename }} {{ $leader->surname }}</strong></p>
                @endif
            @endforeach
            @if($thisSeason->year > 1957)
                @foreach ($thisConstructorStandings->sortBy('position') as $leaderTeam)
                    @if ($loop->first)
                        <p>Leader (Constructor): <strong>{{ $leaderTeam->name }}</strong></p>
                    @endif
            @endforeach 
            @endif
            @isset($thisSeasonDescriptions[0]->pointsSystem)
                <p>Points system: <strong>{{ $thisSeasonDescriptions[0]->pointsSystem }}</strong></p>
            @endisset
            @isset($thisSprintRacePoints)
                <p>Sprint Race Points: <strong>{{ $thisSprintRacePoints }}</strong></p>
            @endisset
            @isset($thisFastestLapPoints)
                <p>Fastest Lap Points: <strong>{{ $thisFastestLapPoints }}</strong></p>
            @endisset
            <p>Number of Grand Prix: <strong>{{ count($thisRaces) }}</strong></p>
            @foreach ($thisRaces->sortBy('date') as $race)
                @if ($loop->first)
                    <p>First Grand Prix: <strong>{{ $race->date }}</strong></p>
                @endif
            @endforeach
            @foreach ($thisRaces->sortBy('date') as $race)
                @if ($loop->last)
                    <p>Last Grand Prix: <strong>{{ $race->date }}</strong></p>
                @endif
            @endforeach
            <p>Different Race Winners: <strong>{{ $thisDistinctWinners }}</strong></p>
            <p>Different Race Winners (Constructors): <strong>{{ $thisDistinctWinnersConstructors }}</strong></p>
            <p>Different Podium Finishers: <strong>{{ $thisDistinctPodiumFinishers }}</strong></p>
            <p>Different Podium Finishers (Constructors): <strong>{{ $thisDistinctPodiumFinishersConstructors }}</strong></p>
        </div>
        <div class="descript_cont">
            <h3>Description</h3>
            @isset($thisSeasonDescriptions[0]->description)
            <p>{{ $thisSeasonDescriptions[0]->description }}</p>
            @endisset   
            @isset($thisSeasonDescriptions[0]->source)
                <p id="source">Description source:&nbsp;&nbsp;<a href="//{{ $thisSeasonDescriptions[0]->sourceURL }}" target="_blank">{{ $thisSeasonDescriptions[0]->source }}</a></p>   
            @endisset
        </div>
    </div>

</div>