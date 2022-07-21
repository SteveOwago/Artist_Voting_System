@extends('layouts.backend')
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
@endsection
@section('content')
    {{-- Dashboard Statistics Section --}}
    @if (Auth::user()->role_id == 1 || Auth::user()->role_id == 4)
        <div class="row">
            {{-- @if (\Carbon\Carbon::now()->month == 02 || \Carbon\Carbon::now()->month == 03) --}}
                <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0"><a href="{{route('artists')}}" style="text-decoration: none;  color:black;">{{ count($artists) }} Artists</a></h3>
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
                                        <h3 class="mb-0"><a href="{{route('sportstars')}}" style="text-decoration: none; color:black;">{{ count($regions) }} Sportstars</a></h3>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-warning">
                                        <span class="mdi mdi-music icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Registered Sportstars</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{ count($regions) }} Regions</h3>
                                        {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-warning">
                                        <span class="mdi mdi-music icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Regions</h6>
                        </div>
                    </div>
                </div>
            {{-- @endif --}}
            {{-- @if (\Carbon\Carbon::now()->month == 04 || \Carbon\Carbon::now()->month == 05)
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
                <div class="col-xl-4 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <div class="d-flex align-items-center align-self-start">
                                        <h3 class="mb-0">{{ count($finalistsArtists) }} Artists and SportStars
                                        </h3>
                                        {{-- <p class="text-muted ml-2 mb-0 font-weight-medium">-2.4%</p> --}}
                                    {{-- </div>
                                </div>
                                <div class="col-3">
                                    <div class="icon icon-box-warning">
                                        <span class="mdi mdi-library-music icon-item"></span>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text-muted font-weight-normal">Finalists</h6>
                        </div>
                    </div>
                </div>
            @endif --}}

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
        {{-- @if (\Carbon\Carbon::now()->month == 02 || \Carbon\Carbon::now()->month == 03) --}}
{{--            <div class="col-lg-12 grid-margin stretch-card" style="height:500px;">--}}
{{--                <div class="card pt-4">--}}
{{--                    <div class="card-body mb-5">--}}
{{--                        <div class="row align-items-center">--}}
{{--                            <div class="col-md-6 mx-auto">--}}
{{--                                <div class="card-title text-dark">--}}
{{--                                    <h3>Artists & Sport Stars Registered This Week Per Day</h3>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <canvas id="myChart-bar" style="height:230px"></canvas>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="col-md-6 mx-auto">--}}
{{--                                <div class="card-title text-dark">--}}
{{--                                    <h3>Registered Artists & Sport Stars Per Region</h3>--}}
{{--                                </div>--}}
{{--                                <div class="card-body" style="position: relative; height:50%; width:50%">--}}
{{--                                    <canvas id="myChart-pie" height="300"></canvas>--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        {{-- @endif --}}
         @if (\Carbon\Carbon::now()->month == 7 || \Carbon\Carbon::now()->month == 8)
            <div class="col-lg-12 grid-margin stretch-card" style="height:800px;">
                <div class="card pt-4">
                    <div class="card-body mb-5">
                        <h4 class="card-title text-dark">Artist Vote Tally</h4>
                        <canvas id="myChart" style="height:230px"></canvas>
                    </div>
                </div>
            </div>
{{--            <div class="col-lg-12 grid-margin stretch-card" style="height:500px;">--}}
{{--                <div class="card pt-4">--}}
{{--                    <div class="card-body mb-5">--}}
{{--                        <h4 class="card-title text-dark">SportStars Vote Tally</h4>--}}
{{--                        <canvas id="myChart-Sport" style="height:230px"></canvas>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        @endif
    </div>
    {{-- End Chart Votes Tally Summary Area Chart --}}

    {{-- Registered Artists --}}

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-dark">All Voting Stations</h4>
                        <div class="col-lg-10 offset-1 table-responsive">
                            <table class="table table-striped table-hover" id="ArtistTable">
                                <thead>
                                    <tr>
                                        <th class="text-center"> Name </th>
                                        <th class="text-center"> Outlet Code</th>
                                        <th class="text-center"> Status </th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                 @forelse ($outlets as $outlet)
                                        <tr>
                                            <td class="text-center">{{ $outlet->outlet_name }}</td>
                                            <td class="text-center">{{ $outlet->outlet_code }}</td>
                                            <td
                                                class="text-center {{ $outlet->status == 1 ? 'text-success' : 'text-danger' }}">
                                                {{ $outlet->status == 1 ? 'Active' : 'Inactive' }}
                                            </td>

                                            <td class="text-center"><a href="{{ route('activate.voting', [$outlet->id]) }}"
                                                    class="btn btn-sm  {{ $outlet->status == 1 ? 'btn-danger' :
                                                'btn-success' }}" > {{ $outlet->status == 1 ? 'Deactivate' :
                                                'Activate' }}</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="3">No Registered Artists</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    {{-- End of registered Users --}}
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>
    {{-- Section Racing Bar vote tally --}}
    @if (\Carbon\Carbon::now()->month == 7 || \Carbon\Carbon::now()->month == 8)
        <script src="https://js.pusher.com/7.1/pusher.min.js"></script>

        <script>


            // const setBg = () => {
            //     const randomColor = "#" + Math.floor(Math.random() * 16777215).toString(16);
            //     return randomColor
            // }
            let myChart = null;
            async function getData() {

                const url = `{{ route('api.votes.getVoteCountPerArtist') }}`;
                let response = await fetch(url);
                const res = await response.json();
                //console.log(data.data[0].name);

                const labels = [];
                const count = [];
                const backgroundColor = [];
                let opacity = 1.0;
                for (let i = 0; i < res.data.length; i++) {
                    let color = 'rgb(252, 186, 3,'
                    color = color + ((opacity -= 0.05).toString()) + ')'
                    labels.push(res.data[i].name);
                    count.push(res.data[i].count);
                    backgroundColor.push(color);

                }
                // console.log(count);

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Votes',
                        data: count,
                        backgroundColor: backgroundColor,
                        borderColor: backgroundColor,
                        borderWidth: 1
                    }]
                };

                // config
                const config = {
                    plugins: [ChartDataLabels],
                    type: 'bar',
                    data,
                    options: {
                        indexAxis: 'y',
                        scales: {
                            x: {
                                beginAtZero: true
                            }
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'top',
                            formatter: Math.round,
                            font: {
                                weight: 'bold'
                            }
                        },
                        responsive: true,
                        maintainAspectRatio: false,
                    }
                };
                // Check if chart is in use
                if (myChart != null){
                    myChart.destroy();
                }
                // render init block
                myChart = new Chart(
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

            // Enable pusher logging - don't include this in production
            Pusher.logToConsole = true;

            var pusher = new Pusher('a6701833f67d9e7d9404', {
                cluster: 'ap2'
            });

            var channel = pusher.subscribe('my-channel');
            channel.bind('my-event', function(data) {
                const infoChart = JSON.stringify(data);

                if(getData()){
                    console.log('Chart Data function hit by endpoint');
                }
               // alert(infoChart);
            });
            // Fetch Data SportStars

            {{--const url_sport = `{{ route('api.votes.getVoteCountPerSportStar') }}`;--}}
            // const setBg = () => {
            //     const randomColor = "#" + Math.floor(Math.random() * 16777215).toString(16);
            //     return randomColor
            // }
            // async function fetchData() {
            //     let response_sport = await fetch(url_sport);
            //     const res_sport = await response_sport.json();
            //     //console.log(data.data[0].name);
            //
            //     const labels_sport = [];
            //     const count_sport = [];
            //     const backgroundColor_sport = [];
            //     let opacity_sport = 1.0;
            //     for (let i = 0; i < res_sport.data.length; i++) {
            //         let color_sport = 'rgb(0, 255, 76,'
            //         color_sport = color_sport + ((opacity_sport -= 0.05).toString()) + ')'
            //         labels_sport.push(res_sport.data[i].name);
            //         count_sport.push(res_sport.data[i].count);
            //         backgroundColor_sport.push(color_sport);
            //
            //     }
            //     // console.log(count);
            //
            //     const data_sport = {
            //         labels: labels_sport,
            //         datasets: [{
            //             label: 'Votes',
            //             data: count_sport,
            //             backgroundColor: backgroundColor_sport,
            //             borderColor: backgroundColor_sport,
            //             borderWidth: 1
            //         }]
            //     };
            //
            //     // config
            //     const config_sport = {
            //         plugins: [ChartDataLabels],
            //         type: 'bar',
            //         data: data_sport,
            //         options: {
            //             indexAxis: 'y',
            //             scales: {
            //                 x: {
            //                     beginAtZero: true
            //                 }
            //             },
            //             datalabels: {
            //                 anchor: 'end',
            //                 align: 'top',
            //                 formatter: Math.round,
            //                 font: {
            //                     weight: 'bold'
            //                 }
            //             },
            //             responsive: true,
            //             maintainAspectRatio: false,
            //         }
            //     };
            //
            //     // render init block
            //     const myChartSport = new Chart(
            //         document.getElementById('myChart-Sport'),
            //         config_sport
            //     );
            //
            //
            //
            //     setInterval(function updateSport() {
            //         let merged_sport = myChartSport.config_sport.data.labels_sport.map((label, i) => {
            //             return {
            //                 'labels': myChartSport.config_sport.data.labels_sport[i],
            //                 'dataPoints': myChartSport.config_sport.data.datasets[0].data_sport[i],
            //                 'backgroundColor': myChartSport.config_sport.data.datasets[0]
            //                     .backgroundColor_sport[i],
            //                 'borderColor': myChartSport.config_sport.data.datasets[0].borderColor_sport[i]
            //             }
            //         })
            //         // console.log(merged)
            //         const lab_sport = [];
            //         const dp_sport = [];
            //         const bgc_sport = [];
            //         const bc_sport = [];
            //
            //         const dataSort_sport = merged_sport.sort((b, a) => {
            //             return a.dataPoints - b.dataPoints
            //         });
            //
            //         for (i = 0; i < dataSort_sport.length; i++) {
            //             lab_sport.push(dataSort_sport[i].labels_sport);
            //             dp_sport.push(dataSort_sport[i].dataPoints);
            //             bgc_sport.push(dataSort_sport[i].backgroundColor_sport);
            //             bc_sport.push(dataSort_sport[i].borderColor_sport);
            //         }
            //
            //         // console.log(lab);
            //         myChart.config_sport.data_sport.labels_sport = lab_sport;
            //         myChart.config_sport.data_sport.datasets[0].data_sport = dp_sport;
            //         myChart.config_sport.data_sport.datasets[0].backgroundColor_sport = bgc_sport;
            //         myChart.config_sport.data_sport.datasets[0].borderColor_sport = bc_sport;
            //
            //         // function addData(chart, label, data) {
            //         //     chart.data.labels.push(label);
            //         //     chart.data.datasets.forEach((dataset) => {
            //         //         dataset.data.push(data);
            //         //     });
            //         //     chart.update();
            //         // }
            //         myChartSport.updateSport();
            //     }, 1000);
            // }
            //
            // fetchData();
        </script>
    @endif }
    {{-- @if (\Carbon\Carbon::now()->month == 02 || \Carbon\Carbon::now()->month == 03) --}}
{{--        <script>--}}
{{--            const url_bar = `{{ route('api.artists.getregisteredArtistPerDay') }}`;--}}
{{--            const setBg = () => {--}}
{{--                const randomColor = "#" + Math.floor(Math.random() * 16777215).toString(16);--}}
{{--                return randomColor--}}
{{--            }--}}
{{--            async function fetchData() {--}}
{{--                let response_bar = await fetch(url_bar);--}}
{{--                const res_bar = await response_bar.json();--}}

{{--                const labels_bar = [];--}}
{{--                const backgroundColor_bar = [];--}}
{{--                const data_bar1 = [];--}}
{{--                let opacity = 1.0;--}}
{{--                for (let i = 0; i < res_bar.data.length; i++) {--}}
{{--                    let color = 'rgb(245, 162, 10,'--}}
{{--                    color = color + ((opacity -= 0.1).toString()) + ')'--}}
{{--                    //console.log(color)--}}
{{--                    labels_bar.push(res_bar.data[i].day);--}}
{{--                    data_bar1.push(res_bar.data[i].count);--}}
{{--                    backgroundColor_bar.push(color);--}}
{{--                }--}}



{{--                const data_bar = {--}}
{{--                    labels: labels_bar,--}}
{{--                    datasets: [{--}}
{{--                        label: 'Registered Artists This Week',--}}
{{--                        backgroundColor: backgroundColor_bar,--}}
{{--                        // borderColor: ['rgb(106, 255, 51)', 'rgb(255,66,51)', 'rgb(255, 189, 51 )'],--}}
{{--                        data: data_bar1,--}}
{{--                    }]--}}
{{--                };--}}

{{--                const config_bar = {--}}
{{--                    plugins: [ChartDataLabels],--}}
{{--                    type: 'bar',--}}
{{--                    data: data_bar,--}}
{{--                    options: {--}}
{{--                        plugins: {--}}
{{--                            datalabels: {--}}
{{--                                anchor: 'end',--}}
{{--                                align: 'top',--}}
{{--                                formatter: Math.round,--}}
{{--                                font: {--}}
{{--                                    weight: 'bold'--}}
{{--                                }--}}
{{--                            }--}}
{{--                        }--}}
{{--                    }--}}
{{--                };--}}

{{--                // Pie Chart--}}
{{--                const url_pie = `{{ route('api.artists.artistsperRegion') }}`;--}}
{{--                let response_pie = await fetch(url_pie);--}}
{{--                const res_pie = await response_pie.json();--}}

{{--                const labels_pie = [];--}}
{{--                const backgroundColor_pie = [];--}}
{{--                const data_pie1 = [];--}}
{{--                let opacity_pie = 1.0;--}}
{{--                for (let i = 0; i < res_pie.data.length; i++) {--}}
{{--                    let color_pie = 'rgb(245, 162, 10,'--}}
{{--                    color_pie = color_pie + ((opacity_pie -= 0.1).toString()) + ')'--}}
{{--                    console.log(color_pie)--}}
{{--                    labels_pie.push(res_pie.data[i].region);--}}
{{--                    data_pie1.push(res_pie.data[i].count);--}}
{{--                    backgroundColor_pie.push(color_pie);--}}
{{--                }--}}



{{--                const data_pie = {--}}
{{--                    labels: labels_pie,--}}
{{--                    datasets: [{--}}
{{--                        label: 'Registered Artists This Week',--}}
{{--                        backgroundColor: backgroundColor_pie,--}}
{{--                        // borderColor: ['rgb(106, 255, 51)', 'rgb(255,66,51)', 'rgb(255, 189, 51 )'],--}}
{{--                        data: data_pie1,--}}
{{--                    }]--}}
{{--                };--}}

{{--                const config_pie = {--}}
{{--                    type: 'pie',--}}
{{--                    data: data_pie,--}}
{{--                    options: {--}}
{{--                        responsive: true,--}}
{{--                        maintainAspectRatio: true,--}}
{{--                    }--}}
{{--                };--}}

{{--                const myChart_bar = new Chart(--}}
{{--                    document.getElementById('myChart-bar'),--}}
{{--                    config_bar--}}
{{--                );--}}
{{--                const myChart_pie = new Chart(--}}
{{--                    document.getElementById('myChart-pie'),--}}
{{--                    config_pie--}}
{{--                );--}}
{{--            }--}}
{{--            fetchData();--}}
{{--        </script>--}}
    {{-- @endif --}}
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
{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#ArtistTable').DataTable({--}}
{{--                "processing": true,--}}
{{--                "serverSide": true,--}}
{{--                "ajax": "{{ route('api.artists.index') }}",--}}
{{--                "columns": [{--}}
{{--                        "data": "created_at"--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "data": "name"--}}
{{--                    },--}}
{{--                    // { "data": "email"},--}}
{{--                    {--}}
{{--                        "data": "phone"--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "data": "is_approved"--}}
{{--                    },--}}
{{--                    {--}}
{{--                        "data": "action",--}}
{{--                        orderable: false,--}}
{{--                        searchable: false--}}
{{--                    },--}}
{{--                ],--}}
{{--                dom: 'lBfrtip',--}}
{{--                buttons: [--}}
{{--                    'copy',--}}
{{--                    {--}}
{{--                        extend: 'excelHtml5',--}}
{{--                        title: 'Artist_and_Sport_Stars_list',--}}
{{--                        exportOptions: {--}}
{{--                            exportOptions: {--}}
{{--                                columns: [0, 1, 2, 3, 4, ':visible']--}}
{{--                            }--}}
{{--                        }--}}
{{--                    },--}}
{{--                    {--}}
{{--                        extend: 'pdfHtml5',--}}
{{--                        title: 'Artist_and_Sport_Stars_list',--}}
{{--                        exportOptions: {--}}
{{--                            columns: [0, 1, 2, 3, 4]--}}
{{--                        }--}}
{{--                    },--}}
{{--                    'colvis'--}}
{{--                ],--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
    <script>
        $(document).ready(function() {
            $('#ArtistTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy',
                    {
                        extend: 'excelHtml5',
                        title: 'Outlets',
                        exportOptions: {
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, ':visible']
                            }
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Outlets',
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
