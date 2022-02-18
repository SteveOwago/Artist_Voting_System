@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection
@section('content')
    {{-- Dashboard Statistics Section --}}
    @if (Auth::user()->role_id == 1)
        <div class="row">
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($artists) }} Artists</h3>
                                    {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-warning">
                                    <span class="mdi mdi-music icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Registered Artists</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($approvedArtists) }} Artists</h3>
                                    {{-- <p class="text-muted ml-2 mb-0 font-weight-medium">-2.4%</p> --}}
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-warning">
                                    <span class="mdi mdi-library-music icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Approved Artists</h6>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-9">
                                <div class="d-flex align-items-center align-self-start">
                                    <h3 class="mb-0">{{ count($votes) }}</h3>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-box-warning ">
                                    <span class="mdi mdi-briefcase-check icon-item"></span>
                                </div>
                            </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Votes</h6>
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- End Dashboard Statistics Section --}}


    {{-- Chart Votes Tally Area Chart --}}
    <div class="row">
        {{-- <div class="col-lg-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Line chart</h4>
          <canvas id="lineChart" style="height:250px"></canvas>
        </div>
      </div>
    </div> --}}
        <div class="col-lg-12 grid-margin stretch-card" style="height:500px;">
            @if (\Carbon\Carbon::now()->month == 02 || \Carbon\Carbon::now()->month == 03)
                <div class="card pt-4">
                    <div class="card-body mb-5">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">Registered Artist This Week</h4>
                                <div class="card-body">
                                    <canvas id="myChart-bar" style="height:230px"></canvas>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="card-title">Artist Vote Tally</h4>
                                <div class="card-body" style="position: relative; height:50%; width:50%">
                                    <canvas id="myChart-pie" height="300"></canvas>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (\Carbon\Carbon::now()->month == 04 || \Carbon\Carbon::now()->month == 05)
                <div class="card pt-4">
                    <div class="card-body mb-5">
                        <h4 class="card-title">Artist Vote Tally</h4>
                        <canvas id="myChart" style="height:230px"></canvas>
                    </div>
                </div>
            @endif
        </div>
    </div>
    {{-- End Chart Votes Tally Summary Area Chart --}}

    {{-- Registered Artists --}}
    @if (Auth::user()->role_id == 1)
        <div class="row">
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
                                            <td>{{ $artist->name }}</td>
                                            <td class="text-center">{{ $artist->email }}</td>
                                            <td class="text-center">{{ $artist->phone }}</td>
                                            <td
                                                class="text-center {{ $artist->is_approved == 1 ? 'text-warning' : 'text-danger' }}">
                                                {{ $artist->is_approved == 1 ? 'Approved' : 'Not Approved' }}
                                            </td>
                                            <td class="text-center">{{ $artist->created_at }}</td>
                                            <td class="text-center"><a href="{{ route('profile', [$artist->id]) }}"
                                                    class="btn btn-sm btn-dark"> View </a> &nbsp;
                                                @if ($artist->is_approved == 1 && Auth::user()->role_id == 1)
                                                    <a class="btn btn-sm btn-danger"
                                                        href="{{ route('disapprove', [$artist->id]) }}"
                                                        onclick="event.preventDefault();
                                                                                                document.getElementById('disapprove').submit();">
                                                        Disapprove
                                                    </a>

                                                    <form id="disapprove"
                                                        action="{{ route('disapprove', [$artist->id]) }}" method="POST"
                                                        class="d-none">
                                                        @csrf
                                                    </form>
                                                @endif
                                                @if ($artist->is_approved == 0 && Auth::user()->role_id == 1)
                                                    <a class="btn btn-sm btn-warning"
                                                        href="{{ route('approve', [$artist->id]) }}"
                                                        onclick="event.preventDefault();
                                                                                                document.getElementById('approve').submit();">
                                                        Approve
                                                    </a>

                                                    <form id="approve" action="{{ route('approve', [$artist->id]) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                @endif
                                                &nbsp; @if (Auth::user()->role_id == 1)
                                                    <a class="btn btn-sm btn-danger"
                                                        href="{{ route('delete', [$artist->id]) }}" onclick="event.preventDefault();
                                                                          document.getElementById('delete').submit();">
                                                        Delete
                                                    </a>

                                                    <form id="delete" action="{{ route('delete', [$artist->id]) }}"
                                                        method="POST" class="d-none">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                @endif
                                            </td>
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
        </div>
    @endif
    {{-- End of registered Users --}}
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- Section Racing Bar vote tally --}}
    @if (\Carbon\Carbon::now()->month == 04 || \Carbon\Carbon::now()->month == 05)
        <script>
            const url = `{{ route('api.votes.getVoteCountPerArtist') }}`;
            const setBg = () => {
                const randomColor = "#" + Math.floor(Math.random() * 16777215).toString(16);
                return randomColor
            }
            async function getData() {
                let response = await fetch(url);
                const res = await response.json();

                //console.log(data.data[0].name);

                const labels = [];
                const count = [];
                const backgroundColor = [];
                for (let i = 0; i < 10; i++) {
                    labels.push(res.data[i].name);
                    count.push(res.data[i].count);
                    backgroundColor.push(setBg());

                }
                // console.log(count);

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Artist Votes',
                        data: count,
                        backgroundColor: backgroundColor,
                        borderColor: backgroundColor,
                        borderWidth: 1
                    }]
                };

                // config 
                const config = {
                    type: 'bar',
                    data,
                    options: {
                        indexAxis: 'y',
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                };

                // render init block
                const myChart = new Chart(
                    document.getElementById('myChart'),
                    config
                );



                setInterval(function update() {
                    let merged = myChart.config.data.labels.map((label, i) => {
                        return {
                            'labels': myChart.config.data.labels[i],
                            'dataPoints': myChart.config.data.datasets[0].data[i],
                            'backgroundColor': myChart.config.data.datasets[0].backgroundColor[i],
                            'borderColor': myChart.config.data.datasets[0].borderColor[i]
                        }
                    })
                    // console.log(merged)
                    const lab = [];
                    const dp = [];
                    const bgc = [];
                    const bc = [];

                    const dataSort = merged.sort((b, a) => {
                        return a.dataPoints - b.dataPoints
                    });

                    for (i = 0; i < dataSort.length; i++) {
                        lab.push(dataSort[i].labels);
                        dp.push(dataSort[i].dataPoints);
                        bgc.push(dataSort[i].backgroundColor);
                        bc.push(dataSort[i].borderColor);
                    }

                    // console.log(lab);
                    myChart.config.data.labels = lab;
                    myChart.config.data.datasets[0].data = dp;
                    myChart.config.data.datasets[0].backgroundColor = bgc;
                    myChart.config.data.datasets[0].borderColor = bc;

                    function addData(chart, label, data) {
                        chart.data.labels.push(label);
                        chart.data.datasets.forEach((dataset) => {
                            dataset.data.push(data);
                        });
                        chart.update();
                    }
                    myChart.update();
                }, 1000);
            }

            getData();
        </script>
    @endif
    @if (\Carbon\Carbon::now()->month == 02 || \Carbon\Carbon::now()->month == 03)
        <script>
            const url_bar = `{{ route('api.artists.getregisteredArtistPerDay') }}`;
            const setBg = () => {
                const randomColor = "#" + Math.floor(Math.random() * 16777215).toString(16);
                return randomColor
            }
            async function fetchData() {
                let response_bar = await fetch(url_bar);
                const res_bar = await response_bar.json();

                const labels_bar = [];
                const backgroundColor_bar = [];
                const data_bar1 = [];
                let opacity = 0.0;
                for (let i = 0; i < 8; i++) {
                    let color = 'rgb(245, 162, 10,'
                    color = color + ((opacity += 0.15).toString()) + ')'
                    console.log(color)
                    labels_bar.push(res_bar.data[i].day);
                    data_bar1.push(res_bar.data[i].count);
                    backgroundColor_bar.push(color);
                }



                const data_bar = {
                    labels: labels_bar,
                    datasets: [{
                        label: 'Registered Artists This Week',
                        backgroundColor: backgroundColor_bar,
                        // borderColor: ['rgb(106, 255, 51)', 'rgb(255,66,51)', 'rgb(255, 189, 51 )'],
                        data: data_bar1,
                    }]
                };

                const config_bar = {
                    type: 'bar',
                    data: data_bar,
                    options: {}
                };
                const config_pie = {
                    type: 'pie',
                    data: data_bar,
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                    }
                };

                const myChart_bar = new Chart(
                    document.getElementById('myChart-bar'),
                    config_bar
                );
                const myChart_pie = new Chart(
                    document.getElementById('myChart-pie'),
                    config_pie
                );
            }
            fetchData();
        </script>
    @endif
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            $('#ArtistTable').DataTable({
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
