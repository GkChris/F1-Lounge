<div class="fastest_laps_table">
    <table class="table">
        <thead class="thead-dark align-middle">
            <th scope="col">Rank</th>
            <th scope="col">Driver</th>
            <th scope="col">Fastest lap</th>
            <th scope="col">Done at lap</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($thisFullResults->sortBy('fastestLapTime') as $driver)
                @if ($driver->fastestLapTime != '\N')
                    <tr>
                        <th scope="row">{{ $driver->rank }}</th>          
                        <td><a href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>
                        <td>{{ $driver->fastestLapTime }}</td> 
                        <td>{{ $driver->fastestLap }}</td> 
                    </tr>
                @else
                    <tr>
                        <th scope="row">-</th>          
                        <td><a href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>
                        <td>Not set</td> 
                        <td>-</td> 
                    </tr>
                @endif
            @endforeach
        </tbody>
      </table>
</div>