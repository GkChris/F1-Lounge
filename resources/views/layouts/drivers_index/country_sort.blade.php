<div class="row drivers_part_grid">
    @foreach ($allDriversByYear as $driver)
    @if (isset($driver->firstRace))
        <div class="col-xl-6">
            <a href="/drivers/{{ $driver->driverRef }}" class="driver_part_container">
                <div class="driver_image">
                    <img src="/images/jpg/drivers/{{ $driver->driverRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                </div>
                <div class="driver_info">
                    <h4><i>{{ $driver->forename }}</i> <strong>{{ $driver->surname }}</strong></h4>
                    <p>{{ $driver->nationality }}</p>
                    <p id="dob">Born: {{ $driver->dob }}</p>  
                    @if ($driver->firstRace == $driver->lastRace)
                        <p>Raced at {{ $driver->lastRace }}</p>        
                    @else
                        @if (isset($driver->status) && $driver->status == 'Ex - Formula 1 Driver')
                            <p>Raced from {{ $driver->firstRace }} to {{ $driver->lastRace }}</p>
                        @else
                            <p>Racing from {{ $driver->firstRace }} to today</p>
                        @endif          
                    @endif          
                </div>
            </a>
        </div>
    @endif
    @endforeach
</div>