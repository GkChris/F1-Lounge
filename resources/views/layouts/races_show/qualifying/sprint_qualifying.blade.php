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
            @foreach ($thisSprintFullResults->sortBy('position') as $driver)
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
        
        </tbody>
      </table>
</div>