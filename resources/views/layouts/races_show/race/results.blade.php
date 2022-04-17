<div class="results_table" id="results_table">
    <table class="table">
        <thead class="thead-dark align-middle">
            <th scope="col">Position</th>
            <th scope="col">Points</th>
            <th scope="col">Driver</th>
            <th scope="col">Grid</th>
            <th scope="col">Nationality</th>
            <th scope="col">status</th>
            <th scope="col">laps</th>
            <th scope="col">Team</th>
          </tr>
        </thead>
        <tbody>
            @if ($agent->isDesktop())
                @foreach ($thisFullResults->sortBy('position') as $driver)
                    <tr onclick="openResultsModal(
                        '{{ $driver->driverNationality }}',
                        '{{ $driver->number }}',
                        '{{ $driver->grid }}',
                        '{{ $driver->position }}',
                        '{{ $driver->points }}',
                        '{{ $driver->laps }}', 
                        '{{ $driver->time }}',
                        '{{ $driver->fastestLap }}',
                        '{{ $driver->rank }}',
                        '{{ $driver->fastestLapTime }}',
                        '{{ $driver->fastestLapSpeed }}',
                        '{{ $driver->driverRef }}', 
                        '{{ $driver->forename }}',
                        '{{ $driver->surname }}',
                        '{{ $driver->dob }}',
                        '{{ $driver->nationality }}', 
                        '{{ $driver->name }}',
                        '{{ $driver->status }}'
                    );">
                        @if ($driver->position != '\N' )
                            <th scope="row">{{ $driver->position }}</th>  
                        @else
                            <th scope="row">DNF</th>  
                        @endif  
                        <td>{{ $driver->points }}</td>      
                        <td>{{ $driver->forename }} {{ $driver->surname }}</td>
                        <td>{{ $driver->grid }}</td> 
                        <td>{{ $driver->driverNationality }}</td> 
                        @if ($driver->time != '\N' )
                            <td>{{ $driver->time  }}</td>
                        @else
                            <td>{{ $driver->status  }}</td>
                        @endif
                        <td>{{ $driver->laps  }}</td>
                        <td><a href="/constructors/{{ $driver->constructorRef }}">{{ $driver->name }}</a></td>    
                    </tr>
                @endforeach
            @else
                @foreach ($thisFullResults->sortBy('position') as $driver)
                <tr>
                    @if ($driver->position != '\N' )
                        <th scope="row">{{ $driver->position }}</th>  
                    @else
                        <th scope="row">DNF</th>  
                    @endif  
                    <td>{{ $driver->points }}</td>      
                    <td><a href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>
                    <td>{{ $driver->grid }}</td>
                    <td>{{ $driver->driverNationality }}</td>  
                    @if ($driver->time != '\N' )
                        <td>{{ $driver->time  }}</td>
                    @else
                        <td>{{ $driver->status  }}</td>
                    @endif
                    <td>{{ $driver->laps  }}</td>
                    <td><a href="/constructors/{{ $driver->constructorRef }}">{{ $driver->name }}</a></td>    
                </tr>
                @endforeach
            @endif
        </tbody>
      </table>
</div>




