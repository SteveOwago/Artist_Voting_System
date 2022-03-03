@extends('layouts.backend')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection
@section('content')
    {{-- Registered Artists --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">All receptionists</h4>
                <div class="col-lg-10 offset-1 table-responsive">
                    <table class="table table-striped table-hover" id="receptionistsTable">
                        <thead>
                            <tr>
                                <th> Name </th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date Registered</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($receptionists as $receptionist)
                                <tr>
                                    <td>{{ $receptionist->name }}</td>
                                    <td class="text-center">{{ $receptionist->email }}</td>
                                    <td class="text-center">{{ $receptionist->phone }}</td>
                                    <td class="text-center">{{ $receptionist->created_at }}</td>
                                    <td class="text-center"><a href="{{ route('profile', [$receptionist->id]) }}"
                                            class="btn btn-sm btn-dark"> View </a> &nbsp;
                                            {{-- <a href=""
                                            class="btn btn-sm btn-danger"> Delete </a></td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No Registered receptionists</td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
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
            $('#receptionistsTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excelHtml5',
                        title: 'receptionists_list',
                        exportOptions: {
                            exportOptions: {
                            columns: [0, 1, 2, 3, 4, ':visible' ]
                        }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'receptionists_list',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4]
                        }
                    },
                    'colvis'
                ]
            });
        });
    </script>
@endsection
