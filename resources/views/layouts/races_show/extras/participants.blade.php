<div class="row drivers_part_grid" id="drivers_part_grid">
    <div class="participants_menu">
        <p onclick="partToTeams();">Switch to Constructors</p>
    </div>
    <div class="row" id="drivers_part">
        @foreach ($thisFullResults->sortBy('position') as $driver)
        <div class="col-xl-6">
            <a class="driver_part_container" href="/drivers/{{ $driver->driverRef }}">
                <div class="driver_image">
                    <img src="/images/jpg/drivers/{{ $driver->driverRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                </div>
                <div class="driver_info">
                    <h4><i>{{ $driver->forename }}</i> <strong>{{ $driver->surname }}</strong></h4>
                    <p>{{ $driver->nationality }}</p>
                    <p id="dob">{{ $driver->dob }}</p>  
                    <p>Team: {{ $driver->name }}</p>                  
                </div>
            </a>
        </div>
    @endforeach
    </div>
</div>


<div class="row constructors_part_grid" id="constructors_part_grid">
    <div class="participants_menu">
        <p onclick="partToDrivers();">Switch to Drivers</p>
    </div>
    <div class="row" id="constructors_part">
        @foreach ($thisConstructorParticipants->sortBy('name') as $team)
        <div class="col-xl-6">
            <a class="constructors_part_container" href="/constructors/{{ $team->constructorRef }}">
                <div class="constructor_image">
                    <img src="/images/jpg/constructors/{{ $team->constructorRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
                </div>
                <div class="constructor_info">
                    <h4><strong>{{ $team->name }}</strong></h4>
                    <p>{{ $team->nationality }}</p>               
                </div>
            </a>
        </div>
    @endforeach
    </div>
</div>

