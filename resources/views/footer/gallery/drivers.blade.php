<div class="row">
    @foreach(File::glob(public_path('images/jpg/drivers').'/*') as $path)
        @if ($path != public_path('images/jpg/drivers/not_found.jpg'))
            <div class="col-xl-3">
                <a href="{{ str_replace(public_path(), '', $path) }}" target="_blank"><img class="rounded" src="{{ str_replace(public_path(), '', $path) }}"></a>
            </div>
        @endif
    @endforeach
</div>



