@if($thisSeason->year > 1957)
<div class="constructors_table">
    <table class="table">
        <thead class="thead-dark align-middle">
            <th scope="col">Position</th>
            <th scope="col">Name</th>
            <th scope="col">Points</th>
            <th scope="col">Wins</th>
            <th scope="col">Nationality</th>
            <th scope="col">Race Participations</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($thisConstructorStandings->sortBy('position') as $constructor)
                <tr>
                    <th scope="row">{{ $constructor->position }}</th>          
                    <td><a href="/constructors/{{ $constructor->constructorRef }}">{{ $constructor->name }}</a></td>
                    <td>{{ $constructor->points }}</td>
                    <td>{{ $constructor->wins }}</td>
                    <td>{{ $constructor->nationality }}</td> 
                    <td>{{ $constructor->NumOfRaces }}</td> 
                </tr>
            @endforeach
        </tbody>
      </table>
</div>
@else
<div class="constructors_table">
Constructors' championship originally started at 1958
</div>
@endif