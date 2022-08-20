<div class="row rounds_grid">
    @foreach ($allCircuitsAlpha->sortBy('name') as $circuit)
        <div class="col-xl-6 d-flex flex-column">
            <a href="/circuits/{{ $circuit->circuitRef }}" class="rounds_container">
                <div class="round_info">
                    <img src="/images/jpg/circuits/flag/{{ $circuit->country }}.jpg">
                </div>
                <div class="race_info">                                           
                    <p><strong>{{ $circuit->name }}</strong></p>
                    <span>{{ $circuit->location }} &nbsp;|&nbsp; {{ $circuit->country }}</span>
                </div>                               
            </a>
            @if ($agent->isDesktop())
            <div class="gg">
                <div class="gg_content">
                    <p>{{ $circuit->name }}</p>
                    <img src="/images/jpg/circuits/bg/{{ $circuit->circuitRef }}.jpg">
                </div>
            </div>
            @endif
        </div>
    @endforeach
</div>



