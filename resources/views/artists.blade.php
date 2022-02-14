@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
@endsection
@section('content')

{{-- Registered Artists --}}
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">All Registered Artists</h4>
        <div class="col-lg-10 offset-1 table-responsive">
          <table class="table table-striped table-hover" id="ArtistTable">
            <thead>
              <tr>
                <th> Name </th>
                <th>Email</th>
                <th>Phone</th>
                <th> Status </th>
                <th>Date Registered</th>
                <th class="text-center">Actions</th>
              </tr>
            </thead>
            <tbody>
                @forelse ($artists as $artist)
                    <tr>
                        <td>{{ $artist->name}}</td>
                        <td class="text-center">{{ $artist->email}}</td>
                        <td class="text-center">{{ $artist->phone}}</td>
                        <td class="text-center">{{ $artist->is_approved == '1'?"Aproved":"Not Approved"}}</td>
                        <td class="text-center">{{ $artist->created_at}}</td>
                        <td class="text-center"><a href="{{route('profile',[$artist->id])}}" class="btn btn-sm btn-primary"> View </a> &nbsp;  
                          @if ($artist->is_approved == 1 && Auth::user()->role_id == 1)
                              <a class="btn btn-sm btn-danger" href="{{ route('disapprove',[$artist->id])}}"
                                          onclick="event.preventDefault();
                                                          document.getElementById('disapprove').submit();">
                                              Disapprove
                                          </a>
      
                                          <form id="disapprove" action="{{ route('disapprove',[$artist->id]) }}" method="POST" class="d-none">
                                              @csrf
                                          </form>   
                          @endif
                          @if ($artist->is_approved == 0 && Auth::user()->role_id == 1)
                            <a class="btn btn-sm btn-success" href="{{ route('approve',[$artist->id])}}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('approve').submit();">
                                            Approve
                                        </a>

                                        <form id="approve" action="{{ route('approve',[$artist->id]) }}" method="POST" class="d-none">
                                            @csrf
                                        </form>   
                          @endif
                      &nbsp; <a href="" class="btn btn-sm btn-danger"> Delete </a></td>
                    </tr>
                @empty
                    <tr>
                        <td class="text-center" colspan="6">No Registered Artists</td>
                    </tr>
                @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
{{-- End of registered Users --}}

@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script>
      $(document).ready(function (){
        $('#ArtistTable').DataTable({
          "processing":true,
          "serverSide":true,
          "ajax": "{{route('api.artists.index')}}",
          "columns":[
            { "data": "name"},
            { "data": "email"},
            { "data": "phone"},
            { "data": "is_approved"},
            { "data": "created_at"},
          ]
        });
      });
    </script> --}}
    <script>
        $(document).ready(function() {
            $('#ArtistTable').DataTable();
        } );
    </script>
@endsection