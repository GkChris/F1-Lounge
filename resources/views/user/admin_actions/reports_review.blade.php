<div class="row w-100">
    {{-- SHOW reports --}}
    <div class="col-xl-12">
        <div class="text-center"><h2>Review Reports</h2></div>
        <div id="theReports" class="mt-4">
            @foreach ($thisReports as $report)
            @if ($report->repId != '1')
            <div class="w-100 bg-light text-center rounded mb-3" style="box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
                <p>Report:</p>
                <p>{{ $report->comment }}</p>
                <p style="border-top: 1px solid grey; margin: auto 5rem auto 5rem;">User Id: {{ $report->id }}</p>
                <p style="margin:auto;">Report Id: {{ $report->repId }}</p>
                <p style="margin:auto;">Date: {{ $report->created_at }}</p>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    
</div>