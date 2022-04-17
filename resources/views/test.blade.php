<script src="{{ asset('js/test.js') }}" defer></script>



<p id="race">1038</p>
<p id="comment">Third post</p>
<p id="url">https://www.youtube.com/watch?v=TB5yhZdF8SI</p>

<p onclick="req();">SUBMIT</br></p>

@foreach ( $data as $dt )
    @if ($dt->approved == 1)
        <p onclick="test();">{{ $dt->comment }}</br></p>
        <p>{{ $dt->url }}</br></p>    
    @endif
@endforeach