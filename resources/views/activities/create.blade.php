@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">Add Activity</h4>
                <div class="row col-sm-12 col-md-10 mx-auto">
                    <div class="card-body">
                        <form action="{{route('activities.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Activity Title</label>
                                <input class="form-control" type="text" name="title" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Activity Region</label>
                                <select name="region_id" class="form-control" required style="border:1px solid">
                                    <option selected disabled>---Select Region---</option>
                                    @foreach ($regions as $region)
                                        <option value="{{ $region->id }}">
                                            {{ strtoupper($region->name) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select name="status" class="form-control" required style="border:1px solid">
                                    <option selected disabled>---Select Activity Status---</option>
                                        <option value="1">ACTIVE</option>
                                        <option value="0">INACTIVE</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Select Level</label>
                                <select name="phase_id" class="form-control" required style="border:1px solid">
                                    <option selected disabled>---Select Level---</option>
                                    @foreach ($phases as $phase)
                                        <option value="{{ $phase->id }}">
                                            {{ strtoupper($phase->title) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Venue</label>
                                <input class="form-control" type="text" name="venue" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input class="form-control" type="datetime-local" name="start_date" id="" required>
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input class="form-control" type="datetime-local" name="end_date" id="" required>
                            </div>

                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
