<div class="row">
    @foreach(File::glob(public_path('images/jpg/extra').'/*') as $path)
        <div class="col-xl-3">
            <a target="_blank" href="{{ str_replace(public_path(), '', $path) }}"><img class="rounded" src="{{ str_replace(public_path(), '', $path) }}"></a>
        </div>
    @endforeach
</div>