@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
    {{-- Registered participants --}}
    <div class="col-sm-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title text-dark">All Registered Participants for {{ $activityName }}</h4>
                <div class="col-lg-10 offset-1 table-responsive">
                    {{-- <button type="button" class="mb-2 btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Send Registration SMS
                    </button> --}}
                    <!-- Modal -->
                    {{-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header" style="border: none;">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Enter Participant Phone</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{route('send.registration.sms')}}" method="post">
                                    @csrf
                                <div class="modal-body">
                                        <div class="row justify-content-center">
                                            <div class="form-group">
                                                <div class="text-center">
                                                    <input id="phone" type="text"
                                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                        value="{{ old('phone') }}" required placeholder="2547XXXXXXXX"
                                                        autocomplete="phone" style="border-radius:10px;">

                                                    {{-- @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $error }}</strong>
                                                        </span>
                                                    @enderror --}}
                    {{-- </div>
                                            </div>
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div> --}}
                    <table class="table table-striped table-hover display nowrap mt-5" id="participantTable">
                        <thead>
                            <tr>
                                <th>Date Registered</th>
                                <th> Name </th>
                                {{-- <th>Email</th> --}}
                                <th>Phone</th>
                                <th>Region</th>
                                <th> Registration Number</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($participants as $participant)
                                <tr>
                                    <td class="text-center">{{ $participant->datecreated }}</td>
                                    <td>{{ $participant->name }}</td>
                                    {{-- <td class="text-center">{{ $participant->email }}</td> --}}
                                    <td class="text-center">{{ '*********' . substr($participant->msisdn, -3) }}</td>
                                    <td class="text-center">{{ $participant->region }}</td>
                                    <td class="text-center">
                                        {{ $participant->registration_no }}
                                    </td>
                                    <td class="text-center">
                                        {{-- <a
                                            href="/attendance/checkin/{{ $participant->tableid }}/{{ $activityID }}"
                                            class="btn btn-primary">Check-In</a> --}}
                                            @if ($participant->tableid == \DB::table('checkins')->select('user_id')->where('activity_id',$activityID)->take(1)->value('user_id') )
                                            <button type="button" class="mb-2 btn btn-warning">
                                                User Checked In
                                            </button>
                                            @endif
                                            @if ($participant->tableid != \DB::table('checkins')->select('user_id')->where('activity_id',$activityID)->take(1)->value('user_id') )
                                            <button type="button" class="mb-2 btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModalCenter{{$participant->tableid}}">
                                                Sign In
                                            </button>
                                            <div class="modal fade" id="exampleModalCenter{{$participant->tableid}}"
                                                tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                aria-hidden="true" data-backdrop="static" data-keyboard="false">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="border: none;">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Enter Participant
                                                                Audition Code for : {{ '*********' . substr($participant->msisdn, -3) }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('attendance.checkin') }}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row justify-content-center">
                                                                    <div class="form-group">
                                                                        <div class="text-center">
                                                                            <label for="code">Audition Code:</label>
                                                                            <input id="code" type="text"
                                                                                class="form-control @error('code') is-invalid @enderror"
                                                                                name="code" value="{{ old('code') }}" required
                                                                                placeholder="AO001" autocomplete="phone"
                                                                                style="border-radius:10px;">
                                                                                <input type="hidden" name="user_id" value="{{$participant->tableid}}">
                                                                                <input type="hidden" name="activity_id" value="{{$activityID}}">
                                                                                <input type="hidden" name="name" value="{{$participant->name}}">
                                                                                <input type="hidden" name="phone" value="{{$participant->msisdn}}">
                                                                                <input type="hidden" name="role_id" value="{{$participant->participant_type == 2 ? 3 : 2 }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="text-center">
                                                                            <label for="activity">Audition Region</label>
                                                                            <select name="region" id=""  style="border:1px;border-radius:10px;">
                                                                                <option selected value="{{$activityID}}">{{$activityName}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-warning">Submit</button>
                                                            </div>
                                                            @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">No Registered participants</td>
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
            $('#participantTable').DataTable({
                dom: 'lBfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excelHtml5',
                        title: 'participant_list',
                        exportOptions: {
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, ':visible']
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'participant_list',
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
