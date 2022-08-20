<div class="row drivers_part_grid" id="mainTab">
    @foreach ($thisFullDriverStandings->sortBy('surname') as $driver)
        <div class="col-xl-6">
            <a href="/drivers/{{ $driver->driverRef }}"class="driver_part_container">
                <div class="driver_image">
                    <img src="/images/jpg/drivers/{{ $driver->driverRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                </div>
                <div class="driver_info">
                    <h4><i>{{ $driver->forename }}</i> <strong>{{ $driver->surname }}</strong></h4>
                    <p>{{ $driver->nationality }}</p>
                    <p id="dob">{{ $driver->dob }}</p>  
                    <p>Team: {{ $driver->constructorName }}</p>                  
                </div>
            </a>
        </div>
    @endforeach
</div>


