<div class="drivers_table">
    <table class="table">
        <thead class="thead-dark align-middle">
            <th scope="col">Position</th>
            <th scope="col">Name</th>
            <th scope="col">Points</th>
            <th scope="col">Wins</th>
            <th scope="col">Nationality</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">Team</th>
            <th scope="col">Race Participations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($thisFullDriverStandings->sortBy('position') as $driver)
                <tr>
                    <th scope="row">{{ $driver->position }}</th>          
                    <td><a href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>
                    <td>{{ $driver->points }}</td>
                    <td>{{ $driver->wins }}</td>
                    <td>{{ $driver->nationality }}</td> 
                    <td>{{ $driver->dob }}</td> 
                    <td><a href="/constructors/{{ $driver->constructorRef }}">{{ $driver->constructorName }}</a></td>
                    <td>{{ $driver->NumOfRaces }}</td> 
                </tr>
            @endforeach
        </tbody>
      </table>
</div>