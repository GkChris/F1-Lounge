<div class="qualifying_table">
    <table class="table">
        <thead class="thead-dark align-middle">
            <th scope="col">Position</th>
            <th scope="col">Driver</th>
            <th scope="col">Q1</th>
            <th scope="col">Q2</th>
            <th scope="col">Q3</th>
            <th scope="col">Team</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($thisFullQualifying->sortBy('position') as $driver)
                <tr>
                    <th scope="row">{{ $driver->position }}</th>     
                    <td><a href="/drivers/{{ $driver->driverRef }}">{{ $driver->forename }} {{ $driver->surname }}</a></td>
                    @if ($driver->q1 != '\N' )
                        <td>{{ $driver->q1  }}</td>  
                    @else
                        <td></td>  
                    @endif 
                    @if ($driver->q2 != '\N' )
                        <td>{{ $driver->q2  }}</td>  
                    @else
                        <td></td>  
                    @endif  
                    @if ($driver->q3 != '\N' )
                        <td>{{ $driver->q3  }}</td> 
                    @else
                        <td></td>   
                    @endif             
                    <td><a href="/constructors/{{ $driver->constructorRef }}">{{ $driver->name }}</a></td>    
                </tr>
            @endforeach
        </tbody>
      </table>
</div>