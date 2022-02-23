@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
    {{-- Registered sportstars --}}
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">All Registered Sportstars</h4>
                <div class="col-lg-10 offset-1 table-responsive">
                    <table class="table table-striped table-hover display nowrap" id="sportstarTable">
                        <thead>
                            <tr>
                                <th> Name </th>
                                {{-- <th>Email</th> --}}
                                <th>Phone</th>
                                <th> Status </th>
                                <th>Date Registered</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sportstars as $sportstar)
                                <tr>
                                    <td>{{ $sportstar->name }}</td>
                                    {{-- <td class="text-center">{{ $sportstar->email }}</td> --}}
                                    <td class="text-center">{{ $sportstar->phone }}</td>
                                    <td class="text-center">
                                        {{ $sportstar->is_approved == '1' ? 'Approved' : 'Not Approved' }}
                                    </td>
                                    <td class="text-center">{{ $sportstar->created_at }}</td>
                                    <td class="text-center"><a href="{{ route('profile', [$sportstar->id]) }}"
                                            class="btn btn-sm btn-dark"> View </a> &nbsp;
                                        @if ($sportstar->is_approved == 1 && Auth::user()->role_id == 1)
                                            <a class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#exampleModal{{ $sportstar->id }}" href="#">
                                                Disapprove
                                            </a>
                                            <div class="modal fade" id="exampleModal{{ $sportstar->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">REJECT sportstar :
                                                                {{ strtoupper($sportstar->name) }}</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('disapprove', [$sportstar->id]) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="reason">Select Reason</label>
                                                                    <select name="reason_id" class="form-control" style="border:solid 1px;">
                                                                        <option selected disabled>Select Reason</option>
                                                                        @foreach ($reasons as $reason)
                                                                            <option value="{{$reason->id}}">{{strtoupper($reason->reason)}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="reason">Reason Description</label>
                                                                    <textarea class="form-control" name="reason" id="" cols="30" rows="10"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        @if ($sportstar->is_approved == 0 && Auth::user()->role_id == 1)
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('approve', [$sportstar->id]) }}" onclick="event.preventDefault();
                                                                        document.getElementById('approve').submit();">
                                                Approve
                                            </a>

                                            <form id="approve" action="{{ route('approve', [$sportstar->id]) }}"
                                                method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        @endif
                                        &nbsp; @if (Auth::user()->role_id == 1)
                                            <a class="btn btn-sm btn-danger" href="{{ route('delete', [$sportstar->id]) }}"
                                                onclick="event.preventDefault();
                                                                  document.getElementById('delete').submit();">
                                                Delete
                                            </a>

                                            <form id="delete" action="{{ route('delete', [$sportstar->id]) }}" method="POST"
                                                class="d-none">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        @endif
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No Registered sportstars</td>
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
    <script>
        $(document).ready(function() {
            $('#sportstarTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excelHtml5',
                        title: 'Judges_list',
                        exportOptions: {
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, ':visible']
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Judges_list',
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
