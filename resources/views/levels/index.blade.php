@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content')

    {{-- Artists --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="background-color: rgb(243, 241, 227)">
                <h4 class="card-title text-dark">Artists Levels</h4>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                    @forelse ($levels as $level)
                                        <div class="col-sm-12 col-lg-3 mx-auto">
                                            <div class="card" style="border:0px;">
                                                <div class="card-header" style="border:0px; background:#fff;">
                                                    {{ strtoupper($level->title) }}
                                                </div>
                                                <div class="card-body  text-success" style="border:0px;">
                                                    <ul class="list-group" style="list-style: none;">
                                                        <li>Approved Artists : <span> {{count(\DB::table('users')->where('role_id','=',2)->where('is_approved',1)->where('phase_id',$level->id)->get())}}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer" style="border:0px;  background:#fff;">
                                                    <a href="{{route('levels.artists',[$level->id])}}" class="btn btn-warning">View List</a>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-sm-6 mx-auto">
                                            <p>No Phases Registered</p>
                                        </div>
                                    @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End of Artists --}}
    {{-- Sport Stars --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body" style="background-color: rgb(243, 241, 227)">
                <h4 class="card-title text-dark">Sports Stars Levels</h4>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                    @forelse ($levels as $level)
                                        <div class="col-sm-12 col-lg-3 mx-auto">
                                            <div class="card" style="border:0px; background:#fff;">
                                                <div class="card-header" style="border:0px; background:#fff;">
                                                    {{ strtoupper($level->title) }}
                                                </div>
                                                <div class="card-body  text-success" style="border:0px; background:#fff;">
                                                    <ul class="list-group" style="list-style: none;">
                                                        <li>Approved Sport Stars  : <span> {{count(\DB::table('users')->where('role_id','=',3)->where('is_approved',1)->where('phase_id',$level->id)->get())}}</span></li>
                                                    </ul>
                                                </div>
                                                <div class="card-footer" style="border:0px; background:#fff;">
                                                    <a href="{{route('levels.sportstars', [$level->id])}}" class="btn btn-warning">View List</a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    @empty
                                        <div class="col-sm-6 mx-auto">
                                            <p>No Phases Registered</p>
                                        </div>
                                    @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- End SportStars --}}
@endsection
