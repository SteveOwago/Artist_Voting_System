@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')

    {{-- Profile --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{{ $activity->title }}</h4>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-9 mx-auto">
                                    <div class="card">
                                        <div class="card-header">
                                            {{ strtoupper($activity->title) }}
                                        </div>
                                        <div class="card-body  text-dark">
                                            <ul class="list-group">
                                                <li class="list-group-item"><b>Start Date:</b>
                                                    {{ $activity->start_date }} </li>
                                                    <li class="list-group-item"><b>End Date:</b>
                                                        {{ $activity->end_date }} </li>
                                                <li class="list-group-item"><b>Region:</b> {{ \DB::table('regions')->where('id',$activity->region_id)->value('name') }}</li>

                                                <li class="list-group-item"><b>Status:</b><a
                                                            class="btn btn-sm {{ $activity->status == '1' ? 'text-success' : 'text-danger' }}">{{ $activity->status == '1' ? 'Active' : 'Not Active' }}</a>
                                                </li>
                                            </ul>
                                            @if ( Auth::activity()->role_id == 4)
                                                <div class="text-center">
                                                    <a href="{{ route('activities.edit', [$activity->id]) }}"
                                                        class="btn btn-lg btn-primary mt-3">Edit</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of registered activitys --}}

@endsection
