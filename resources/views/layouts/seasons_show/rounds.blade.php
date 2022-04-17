<div class="row rounds_grid">
    @foreach ($thisRaces->sortBy('round') as $race)
        <div class="col-xl-6 d-flex flex-column">
            <a href="/{{ $race->year }}/{{ $race->round }}" class="rounds_container">
                <div class="round_info">
                    <div class="round_flag">                    
                        <p>Round <strong>{{ $race->round }}</strong></p>                                          
                        <img src="/images/jpg/circuits/flag/{{ $race->country }}.jpg">
                    </div>
                    <div class="for_date">
                        <p>{{ $race->date }}</p>
                    </div>
                </div>
                <div class="race_info">                                           
                    <p><strong>{{ $race->Rname }}</strong></p>
                    <span>{{ $race->country }}</span>
                </div>                               
            </a>
            @if ($agent->isDesktop())
            <div class="gg">
                <div class="gg_content">
                    <p>{{ $race->name }}</p>
                    <img src="/images/jpg/circuits/bg/{{ $race->circuitRef }}.jpg">
                </div>
            </div>
            @endif
        </div>
    @endforeach
</div>