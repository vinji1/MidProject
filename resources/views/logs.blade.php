@extends('base')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Activity Log</h1>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="table table-striped bg-info">
                    <tr>
                        <th>Timestamp</th>
                        <th>Log Entry</th>
                    </tr>
                </thead>
                <tbody class="bg-light">
                    @foreach($logs as $log)
                    <tr>
                        <td>{{$log->created_at}}</td>
                        <td>{{$log->log_entry}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{-- <div class="d-grid gap-2 d-md-flex">
    <h1>Activity Log</h1>
</div> --}}


@endsection

    
