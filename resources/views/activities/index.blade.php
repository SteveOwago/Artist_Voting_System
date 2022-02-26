@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
    {{-- Registered Artists --}}
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">Activities</h4>
                <div class="row col-sm-12 col-md-10 mx-auto">
                    @forelse ($activities as $activity)
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <div class="card-header text-dark text-center">{{strtoupper($activity->title)}}</div>
                            <div class="card-body">
                                <ul style="list-style: none;">
                                    <li>Start Date: <span class="text-success">{{ $activity->start_date }}</span></li>
                                    <li>Closing Date: <span class="text-danger">{{ $activity->end_date }}</span></li>
                                </ul>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{route('activities.edit',[$activity->id])}}" class="btn btn-primary">Edit Activity</a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-sm-12 col-md-6">
                        <div class="card">
                            <p class="text-center">No Activities Yet</p>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{-- End of registered Users --}}
@endsection
