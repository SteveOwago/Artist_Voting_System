@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
    {{-- Activities --}}
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">Activities</h4>
                <div class="row col-sm-12 col-md-10 mx-auto">
                    @forelse ($activities as $activity)
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <div class="card-header text-dark text-center">{{ strtoupper($activity->title) }}</div>
                                <div class="card-body">
                                    <ul style="list-style: none;">
                                        <li>Start Date: <span class="text-success">{{ $activity->start_date }}</span>
                                        </li>
                                        <li>Closing Date: <span class="text-danger">{{ $activity->end_date }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="{{ route('activities.edit', [$activity->id]) }}" class="btn btn-primary">Edit
                                        Activity</a>
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
    {{-- End of Activities --}}
    {{-- Phases --}}
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">Approval Phases</h4>
                <div class="row col-sm-12 col-md-10 mx-auto">
                    @forelse ($phases as $phase)
                        <div class="col-sm-12 col-md-6">
                            <div class="card mb-2">
                                <div class="card-header text-dark text-center">{{ strtoupper($phase->title) }}</div>
                                <div class="card-body">
                                    <ul style="list-style: none;">
                                        <li>Status : <span
                                                class="text-success">{{ $phase->status == 0 ? 'Not Active' : 'Ongoing' }}</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    @if ($phase->status == 0)
                                        <a class="btn btn-sm btn-warning"
                                            href="{{ route('phase.activate', [$phase->id]) }}" onclick="event.preventDefault();
                                                                document.getElementById('activate').submit();">
                                            Activate
                                        </a>

                                        <form id="activate" action="{{ route('phase.activate', [$phase->id]) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                    @if ($phase->status == 1)
                                        <a class="btn btn-sm btn-danger"
                                            href="{{ route('phase.deactivate', [$phase->id]) }}" onclick="event.preventDefault();
                                                                document.getElementById('deactivate').submit();">
                                            Deactivate
                                        </a>

                                        <form id="deactivate" action="{{ route('phase.deactivate', [$phase->id]) }}"
                                            method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-sm-12 col-md-6">
                            <div class="card">
                                <p class="text-center">No Phases Yet</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    {{-- End of Phases --}}
@endsection
