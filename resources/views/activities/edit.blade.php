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
                <h4 class="card-title text-dark">Activity: {{ $activity->title }}</h4>
                <div class="row col-sm-12 col-md-10 mx-auto">
                    <div class="card-body">
                        <form action="{{route('activities.update',[$activity->id])}}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="">Activity Title</label>
                                <input class="form-control" type="text" name="title" id="" value="{{$activity->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input class="form-control" type="datetime-local" name="start_date" id="" value="{{$activity->start_date}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input class="form-control" type="datetime-local" name="end_date" id="" value="{{$activity->end_date}}" required>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-success" type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
