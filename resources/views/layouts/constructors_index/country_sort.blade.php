<div class="row constructors_part_grid">
    @foreach ($allConstructorsByCountry as $team)
    <div class="col-xl-6">
        <a href="/constructors/{{ $team->constructorRef }}" class="constructors_part_container">
            <div class="constructor_image">
                <img src="/images/jpg/constructors/{{ $team->constructorRef }}.jpg" onerror="this.onerror=null;this.src='/images/jpg/drivers/not_found.jpg';">
            </div>
            <div class="constructor_info">
                <h4><strong>{{ $team->name }}</strong></h4>
                <p>{{ $team->nationality }}</p>
                <p>Season Entries: {{ $team->entries }}</p>
            </div>
        </a>
    </div>
    @endforeach
</div>