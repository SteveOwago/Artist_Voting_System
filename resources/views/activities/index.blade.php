@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
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
    {{-- Activities --}}
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">Activities</h4>
                <div class="row col-sm-12">
                    <div class="col-sm-12">
                        <div class="card mb-2">
                            <div class="col-lg-10 offset-1 table-responsive mt-5">
                                <a href="{{route('activities.create')}}" class="btn btn-primary mb-3">Add Activity</a>
                                <table class="table table-striped table-hover display nowrap mt-5" id="activityTable">
                                    <thead>
                                        <tr>
                                            <th>Activity</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Region</th>
                                            <th>Venue</th>
                                            <th> Status </th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($activities as $activity)
                                            <tr>
                                                <td>{{ $activity->title }}</td>
                                                <td>{{ $activity->start_date }}</td>
                                                {{-- <td class="text-center">{{ $activity->email }}</td> --}}
                                                <td>{{ $activity->end_date }}</td>
                                                <td>
                                                    {{ strtoupper(\DB::table('regions')->where('id', $activity->region_id)->value('name')) }}
                                                </td>
                                                <td>{{ strtoupper($activity->venue) }}</td>
                                                <td>{{ $activity->status == 1 ? 'ACTIVE' : 'NOT STARTED' }}</td>
                                                <td><a href="{{ route('activities.edit', [$activity->id]) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    &nbsp;<a href="{{ route('activities.delete', [$activity->id]) }}"
                                                        class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">
                                                        Delete
                                                    </a>

                                                    {{-- <form id="delete" action="{{ route('activities.delete', [$activity->id]) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form> --}}
                                                </td>

                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="text-center" colspan="6">No Registered activitys</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    {{-- End of Activities --}}
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
            $('#activityTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excelHtml5',
                        title: 'activity_list',
                        exportOptions: {
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, ':visible']
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'activity_list',
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
