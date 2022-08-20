<div class="row">


    @if (!$isFinalOfCurrent)
        <div class="col-xl-6" id="current_col">
    @else
        <div class="col-xl-12" id="current_col" style="border: none;">
    @endif
    
        <div class="current_standings_table">

            <div id="driver_current">
                <div class="current_info">
                    <h4>After Round {{ $thisRace->round }}</h4>
                    <p onclick="changeCurrentDrivers();">Switch to constructors'</p>
                </div>
                <div class="for_overflow">
                    <table class="table">
                        <thead class="thead-dark align-middle">
                            <th scope="col">Position</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Points</th>
                            <th scope="col">Wins</th>
                            <th scope="col">Team</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($thisFullDriverStandings->sortBy('position') as $driver)
                                <tr>
                                    <th scope="row">{{ $driver->position }}</th>          
                                    <td><a href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>
                                    <td>{{ $driver->points }}</td>
                                    <td>{{ $driver->wins }}</td>
                                    <td><a href="/constructors/{{ $driver->constructorRef }}">{{ $driver->constructorName }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>

            <div id="constructor_current">
                <div class="current_info">
                    <h4>After Round {{ $thisRace->round }}</h4>
                    <p onclick="changeCurrentConstructors();">Switch to drivers'</p>
                </div>
                <div class="for_overflow">
                    <table class="table">
                        <thead class="thead-dark align-middle">
                            <th scope="col">Position</th>
                            <th scope="col">Name</th>
                            <th scope="col">Points</th>
                            <th scope="col">Wins</th>
                            <th scope="col">Nationality</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($thisConstructorStandings->sortBy('position') as $team)
                                <tr>
                                    <th scope="row">{{ $team->position }}</th>          
                                    <td><a href="/constructors/{{ $team->constructorRef }}">{{ $team->name }}</a></td>
                                    <td>{{ $team->points }}</td>
                                    <td>{{ $team->wins }}</td>
                                    <td>{{ $team->nationality }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>

        </div>
    </div>







    @if (!$isFinalOfCurrent)
    <div class="col-xl-6">
        <div class="season_standings_table">

            <div id="driver_season">
                <div class="season_info">
                    @if ($isFinalStandings)
                        <h4>End of Season</h4>
                    @else
                        <h4>Current Standings</h4>
                    @endif
                    <p onclick="changeSeasonDrivers();">Switch to constructors'</p>
                </div>
                <div class="for_overflow">
                    <table class="table">
                        <thead class="thead-dark align-middle">
                            <th scope="col">Position</th>
                            <th scope="col">Driver</th>
                            <th scope="col">Points</th>
                            <th scope="col">Wins</th>
                            <th scope="col">Team</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($thisSeasonFullDriverStandings->sortBy('position') as $driver)
                                <tr>
                                    <th scope="row">{{ $driver->position }}</th>          
                                    <td><a href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>
                                    <td>{{ $driver->points }}</td>
                                    <td>{{ $driver->wins }}</td>
                                    <td><a href="/constructors/{{ $driver->constructorRef }}">{{ $driver->constructorName }}</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>

            <div id="constructor_season">
                <div class="season_info">
                    @if ($isFinalStandings)
                        <h4>End of Season</h4>
                    @else
                        <h4>Current Standings</h4>
                    @endif
                    <p onclick="changeSeasonConstructors();">Switch to drivers'</p>
                </div>
                <div class="for_overflow">
                    <table class="table">
                        <thead class="thead-dark align-middle">
                            <th scope="col">Position</th>
                            <th scope="col">Name</th>
                            <th scope="col">Points</th>
                            <th scope="col">Wins</th>
                            <th scope="col">Nationality</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($thisSeasonConstructorStandings->sortBy('position') as $team)
                                <tr>
                                    <th scope="row">{{ $team->position }}</th>          
                                    <td><a href="/constructors/{{ $team->constructorRef }}">{{ $team->name }}</a></td>
                                    <td>{{ $team->points }}</td>
                                    <td>{{ $team->wins }}</td>
                                    <td>{{ $team->nationality }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
            
        </div>
    </div>
    @endif

</div>

