@extends('layouts.backend')

@section('content')

{{-- Dashboard Statistics Section --}}
<div class="row">
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$12.34</h3>
                {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p> --}}
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Registered Artists</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$17.34</h3>
                {{-- <p class="text-success ml-2 mb-0 font-weight-medium">+11%</p> --}}
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Videos Uploaded</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$12.34</h3>
                {{-- <p class="text-muted ml-2 mb-0 font-weight-medium">-2.4%</p> --}}
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success">
                <span class="mdi mdi-arrow-bottom-left icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Approved Artists</h6>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-9">
              <div class="d-flex align-items-center align-self-start">
                <h3 class="mb-0">$31.53</h3>
                <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
              </div>
            </div>
            <div class="col-3">
              <div class="icon icon-box-success ">
                <span class="mdi mdi-arrow-top-right icon-item"></span>
              </div>
            </div>
          </div>
          <h6 class="text-muted font-weight-normal">Total Votes</h6>
        </div>
      </div>
    </div>
  </div>
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
      <div class="card pt-4">
        <div class="card-body">
          <h4 class="card-title">Artist Vote Tally</h4>
          <canvas id="myChart" style="height:230px"></canvas>
        </div>
      </div>
    </div>
  </div>
{{-- End Chart Votes Tally Summary Area Chart --}}

{{-- Registered Artists --}}
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">All Registered Artists</h4>
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th> Image </th>
                <th> Name </th>
                <th> Date Registered </th>
                <th> Status </th>
                <th> Action </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-1">
                  <img src="{{ asset('backend/assets/images/faces-clipart/pic-1.png')}}" alt="image" />
                </td>
                <td> Herman Beck </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 77.99 </td>
                <td> May 15, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ asset('backend/assets/images/faces-clipart/pic-2.png')}}" alt="image" />
                </td>
                <td> Messsy Adam </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $245.30 </td>
                <td> July 1, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ asset('backend/assets/images/faces-clipart/pic-3.png')}}" alt="image" />
                </td>
                <td> John Richards </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $138.00 </td>
                <td> Apr 12, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ asset('backend/assets/images/faces-clipart/pic-4.png')}}" alt="image" />
                </td>
                <td> Peter Meggik </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 77.99 </td>
                <td> May 15, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ asset('backend/assets/images/faces-clipart/pic-1.png')}}" alt="image" />
                </td>
                <td> Edward </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 160.25 </td>
                <td> May 03, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ asset('backend/assets/images/faces-clipart/pic-2.png')}}" alt="image" />
                </td>
                <td> John Doe </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 123.21 </td>
                <td> April 05, 2015 </td>
              </tr>
              <tr>
                <td class="py-1">
                  <img src="{{ asset('backend/assets/images/faces-clipart/pic-3.png')}}" alt="image" />
                </td>
                <td> Henry Tom </td>
                <td>
                  <div class="progress">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </td>
                <td> $ 150.00 </td>
                <td> June 16, 2015 </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
{{-- End of registered Users --}}

@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const data = {
      labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Weekly Sales',
        data: [18, 12, 6, 9, 12, 3, 9],
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
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

    setInterval(function update(){
        let merged = myChart.config.data.labels.map((label,i) => {
            return {
                'labels' : myChart.config.data.labels[i],
                'dataPoints' : myChart.config.data.datasets[0].data[i],
                'backgroundColor' : myChart.config.data.datasets[0].backgroundColor[i],
                'borderColor' : myChart.config.data.datasets[0].borderColor[i]
            }
        })
       // console.log(merged)
       const lab = [];
       const dp = [];
       const bgc = [];
       const bc = [];

       const dataSort = merged.sort((b,a)=>{
           return a.dataPoints - b.dataPoints
       });

       for(i=0;i<dataSort.length; i++){
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

        // for(x = 0; x<dp.length; x++){
        //     dp[i]+= Math.floor(Math.random() * 11);
        // }

        if(dp[lab.indexOf('Mon')]<100){
            dp[lab.indexOf('Mon')] +=3
        }
        if(dp[lab.indexOf('Tue')]<90){
            dp[lab.indexOf('Tue')] +=2
        }
        if(dp[lab.indexOf('Wed')]<120){
            dp[lab.indexOf('Wed')] +=7
        }
        if(dp[lab.indexOf('Thu')]<85){
            dp[lab.indexOf('Thu')] +=4
        }
        if(dp[lab.indexOf('Fri')]<235){
            dp[lab.indexOf('Fri')] +=1
        }
        if(dp[lab.indexOf('Sat')]<65){
            dp[lab.indexOf('Sat')] +=2
        }
        if(dp[lab.indexOf('Sun')]<50){
            dp[lab.indexOf('Sun')] += 0.5
        }

        myChart.update();
            }, 1000);
    </script>
@endsection