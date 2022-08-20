<div class="pit_stops_table">
    @if (count($thisRacePitStops) != '0')
    <table class="table">
        <thead class="thead-dark align-middle">
            <th scope="col">Lap</th>
            <th scope="col">Driver</th>
            <th scope="col">Stop</th>
            <th scope="col">Duration</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($thisRacePitStops->sortBy('time') as $driver)
                <tr>
                    <th scope="row">{{ $driver->lap }}</th>          
                    <td><a href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>
                    <td>{{ $driver->stop }}</td>
                    <td>{{ $driver->duration }}</td> 
                </tr>
            @endforeach
        </tbody>
      </table>
    @else
    <div style="display: flex; justify-content:center;"><p>No pit stops data</p></div>
    @endif
    
</div>

