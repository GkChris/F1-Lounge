<div class="row" id="overview_cont">
    <div class="col-xl-6 d-flex justify-content-center">
        <div class="testo">
            @foreach ($thisFullDriverStandings->sortBy('position') as $champion)
                @if ($loop->first)
                    <a href="/drivers/{{ $champion->driverRef }}"><div class="testo_content text-center">
                        @if($thisSeason->year > 1957)
                        <p>Drivers' Champion</p>
                        @else
                        <p>Champion</p>
                        @endif
                        <h5>{{ $champion->forename }} {{ $champion->surname }}</h5>
                        
                            <img src="/images/jpg/champion_drivers/{{ $champion->driverRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                        
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
                        <p>Constructors' Champion</p>
                        <h5>{{ $championTeam->name }}</h5>
                        
                            <img id="con_img" src="/images/jpg/champion_constructors/{{ $championTeam->constructorRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                        
                    </div></a>
                @endif
            @endforeach
        </div>
    </div>
    @else
    <div class="col-xl-6 d-flex justify-content-center">
        <div class="testo">
            @foreach ($thisFullDriverStandings->sortBy('position') as $driver)
                @if ($loop->first)
                    <a href="/constructors/{{ $driver->constructorRef }}"><div class="testo_content text-center">
                        <p>Driving for</p>
                        <h5>{{ $driver->constructorName }}</h5>
                        
                            <img id="con_img" src="/images/jpg/champion_constructors/{{ $driver->constructorRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                        
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
            @foreach ($thisFullDriverStandings->sortBy('position') as $champion)
                @if ($loop->first)
                    <p>Champion (Driver): <strong>{{ $champion->forename }} {{ $champion->surname }}</strong></p>
                @endif
            @endforeach
            @if($thisSeason->year > 1957)
                @foreach ($thisConstructorStandings->sortBy('position') as $championTeam)
                    @if ($loop->first)
                        <p>Champion (Constructor): <strong>{{ $championTeam->name }}</strong></p>
                    @endif
            @endforeach 
            @endif
            @isset($thisSeasonDescriptions[0]->pointsSystem)
                <p>Points system: <strong>{{ $thisSeasonDescriptions[0]->pointsSystem }}</strong></p>
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