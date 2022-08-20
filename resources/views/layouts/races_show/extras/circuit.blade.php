<div class="row circuit_grid">
    <div class="circuit_info">
        <h1><strong>{{ $thisCircuit->name }}</strong></h1>
        <h3>{{ $thisCircuit->location }}&nbsp; | &nbsp;{{ $thisCircuit->country }}</h3>
        <a target="_blank" href="http://maps.google.com/maps?z=1&t=k&q=loc:{{ $thisCircuit->lat }}+{{ $thisCircuit->lng }}"><h5>View on Google Maps</h5></a>
    </div>
    <div class="circuit_img">
        <a href="/circuits/{{ $thisCircuit->circuitRef }}"><img src="/images/jpg/circuits/bg/{{ $thisCircuit->circuitRef }}.jpg"></a>
    </div>
</div>