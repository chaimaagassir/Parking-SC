@extends('master')

@section('title' , 'SC Parking | Tableau de bord')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total Client</h6>
                    <h2 class="text-right">
                        <svg height ='30' style='fill : white ; ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M319.9 320c57.41 0 103.1-46.56 103.1-104c0-57.44-46.54-104-103.1-104c-57.41 0-103.1 46.56-103.1 104C215.9 273.4 262.5 320 319.9 320zM369.9 352H270.1C191.6 352 128 411.7 128 485.3C128 500.1 140.7 512 156.4 512h327.2C499.3 512 512 500.1 512 485.3C512 411.7 448.4 352 369.9 352zM512 160c44.18 0 80-35.82 80-80S556.2 0 512 0c-44.18 0-80 35.82-80 80S467.8 160 512 160zM183.9 216c0-5.449 .9824-10.63 1.609-15.91C174.6 194.1 162.6 192 149.9 192H88.08C39.44 192 0 233.8 0 285.3C0 295.6 7.887 304 17.62 304h199.5C196.7 280.2 183.9 249.7 183.9 216zM128 160c44.18 0 80-35.82 80-80S172.2 0 128 0C83.82 0 48 35.82 48 80S83.82 160 128 160zM551.9 192h-61.84c-12.8 0-24.88 3.037-35.86 8.24C454.8 205.5 455.8 210.6 455.8 216c0 33.71-12.78 64.21-33.16 88h199.7C632.1 304 640 295.6 640 285.3C640 233.8 600.6 192 551.9 192z"/></svg>
                        &nbsp;<span>{{$clients}}</span></h2>
                    <a style=" text-decoration:none;" href='clients' class="m-b-0 text-white small">View details&nbsp; &nbsp;
                    <svg height ='15' style='fill : white ; ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg>
                </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total parkings</h6>
                    <h2 class="text-right">
                        <svg  height ='30' style='fill : white ; 'xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M192 256V192H240C257.7 192 272 206.3 272 224C272 241.7 257.7 256 240 256H192zM384 32C419.3 32 448 60.65 448 96V416C448 451.3 419.3 480 384 480H64C28.65 480 0 451.3 0 416V96C0 60.65 28.65 32 64 32H384zM336 224C336 170.1 293 128 240 128H168C145.9 128 128 145.9 128 168V352C128 369.7 142.3 384 160 384C177.7 384 192 369.7 192 352V320H240C293 320 336 277 336 224z"/></svg>
                        &nbsp;<span>{{$parkings}}</span></h2>
                    <a style=" text-decoration:none;" href='parkings' class="m-b-0 text-white small">View details
                        &nbsp; &nbsp;
                        <svg height ='15' style='fill : white ; ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total resevations </h6>
                    <h2 class="text-right">
                        <i class="menu-icon mdi mdi-clipboard-check "></i>
                        {{-- <svg height ='30' style='fill : white ; ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M336 64h-53.88C268.9 26.8 233.7 0 192 0S115.1 26.8 101.9 64H48C21.5 64 0 85.48 0 112v352C0 490.5 21.5 512 48 512h288c26.5 0 48-21.48 48-48v-352C384 85.48 362.5 64 336 64zM96 392c-13.25 0-24-10.75-24-24S82.75 344 96 344s24 10.75 24 24S109.3 392 96 392zM96 296c-13.25 0-24-10.75-24-24S82.75 248 96 248S120 258.8 120 272S109.3 296 96 296zM192 64c17.67 0 32 14.33 32 32c0 17.67-14.33 32-32 32S160 113.7 160 96C160 78.33 174.3 64 192 64zM304 384h-128C167.2 384 160 376.8 160 368C160 359.2 167.2 352 176 352h128c8.801 0 16 7.199 16 16C320 376.8 312.8 384 304 384zM304 288h-128C167.2 288 160 280.8 160 272C160 263.2 167.2 256 176 256h128C312.8 256 320 263.2 320 272C320 280.8 312.8 288 304 288z"/></svg> --}}
                        &nbsp;<span>{{$reservations}}</span></h2>
                    <a style=" text-decoration:none;" href='réservations' class="m-b-0 text-white small">View details 
                        &nbsp; &nbsp;
                        <svg height ='15' style='fill : white ; ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Total promo codes </h6>
                    <h2 class="text-right">
                        <i class="menu-icon  mdi mdi-sale "></i>
                        &nbsp;<span>{{$codespromo}}</span></h2>
                    <a style=" text-decoration:none;" href='codespromo' class="m-b-0 text-white small">View details 
                        &nbsp; &nbsp;
                        <svg height ='15' style='fill : white ; ' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512"><!--! Font Awesome Pro 6.1.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M64 448c-8.188 0-16.38-3.125-22.62-9.375c-12.5-12.5-12.5-32.75 0-45.25L178.8 256L41.38 118.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0l160 160c12.5 12.5 12.5 32.75 0 45.25l-160 160C80.38 444.9 72.19 448 64 448z"/></svg>
                    </a>
                </div>
            </div>
        </div>
	</div>
    {{-- {{$clientschart}} --}}
    
    <div class="row">
        {{-- chart client  --}}
          <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Clients </h4>
                  <canvas id="myChartclient"></canvas>
                </div>
              </div>
            </div>
            {{-- chart reservation --}}
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Reservations</h4>
                  <canvas id="mychartreservation"></canvas>
                </div>
              </div>
            </div>
     </div>
      <div class="row">
                {{-- chartes parkings --}}
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Parkings</h4>
                    <canvas id="myChartparkings"></canvas>
                  </div>
                </div>
              </div>
              {{-- Pie chart --}}
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Reservations of each city</h4>
                    <canvas id="pieChart"></canvas>
                  </div>
                </div>
              </div>
       </div>
      
      
    </div>
      
    </div>
    {{-- {{$parkingschart}}
    {{$reservationschart}} --}}
</div>
{{-- <script src="../../js/chart.js"></script>
<script src="../../vendors/chart.js/Chart.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
{{-- chartclient --}}
<script type="text/javascript">
   var _ydata=JSON.parse('{!! json_encode($monthsclient) !!} ') ; 
   var _xdata=JSON.parse('{!! json_encode($monthscountclient) !!} ') ; 

   var ctx = document.getElementById("myChartclient");
    var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: _ydata,
    datasets: [{
      label: "Clients",
      backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
      data: _xdata,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 9
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 10,
          maxTicksLimit: 10
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
    });
</script>

{{-- chartes parking --}}

<script type="text/javascript">
    var _ydata=JSON.parse('{!! json_encode($monthsparkings) !!} ') ; 
    var _xdata=JSON.parse('{!! json_encode($monthscountparkings) !!} ') ; 
 
    var ctx = document.getElementById("myChartparkings");
     var myLineChart = new Chart(ctx, {
   type: 'bar',
   data: {
     labels: _ydata,
     datasets: [{
       label: "Parkings",
       backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
       data: _xdata,
     }],
   },
   options: {
     scales: {
       xAxes: [{
         time: {
           unit: 'month'
         },
         gridLines: {
           display: false
         },
         ticks: {
           maxTicksLimit: 9
         }
       }],
       yAxes: [{
         ticks: {
           min: 0,
           max: 10,
           maxTicksLimit: 10
         },
         gridLines: {
           display: true
         }
       }],
     },
     legend: {
       display: false
     }
   }
     });
</script>

 {{-- chartes reservation --}}

<script type="text/javascript">
    var _ydata=JSON.parse('{!! json_encode($monthsreservation) !!} ') ; 
    var _xdata=JSON.parse('{!! json_encode($monthscountreservation) !!} ') ; 
 
    var ctx = document.getElementById("mychartreservation");
     var myLineChart = new Chart(ctx, {
   type: 'line',
   data: {
     labels: _ydata,
     datasets: [{
       label: "Reservations",
      //  backgroundColor: "rgba(2,117,216,1)",
       borderColor: "rgba(2,117,216,1)",
       data: _xdata,
      //  fill: false
     }],
   },
   options: {
     scales: {
       xAxes: [{
         time: {
           unit: 'month'
         },
         gridLines: {
           display: false
         },
         ticks: {
           maxTicksLimit: 9
         }
       }],
       yAxes: [{
         ticks: {
           min: 0,
           max: 10,
           maxTicksLimit: 10
         },
         gridLines: {
           display: true
         }
       }],
     },
     legend: {
       display: false
     }
   }
     });
</script>

{{-- chartes reservation by cities --}}

<script type="text/javascript">
  var _ydata=JSON.parse('{!! json_encode($villereservation) !!} ') ; 
  var _xdata=JSON.parse('{!! json_encode($villecountreservation) !!} ') ; 

  var ctx = document.getElementById("pieChart");
   var myLineChart = new Chart(ctx, {
 type: 'pie',
 data: {
   labels: _ydata,
   datasets: [{
     label: "Reservations",
     backgroundColor: [
        'rgba(255, 99, 132, 0.5)',
        'rgba(54, 162, 235, 0.5)',
        'rgba(255, 206, 86, 0.5)',
        'rgba(75, 192, 192, 0.5)',
        'rgba(153, 102, 255, 0.5)',
        'rgba(255, 159, 64, 0.5)'
      ],
      borderColor: [
        'rgba(255,99,132,1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)'
      ],
     data: _xdata,
    //  fill: false
   }],
 },
//  options: {
//    scales: {
//      xAxes: [{
//        time: {
//          unit: 'month'
//        },
//        gridLines: {
//          display: false
//        },
//        ticks: {
//          maxTicksLimit: 9
//        }
//      }],
//      yAxes: [{
//        ticks: {
//          min: 0,
//          max: 10,
//          maxTicksLimit: 10
//        },
//        gridLines: {
//          display: true
//        }
//      }],
//    },
//    legend: {
//      display: false
//    }
//  }
   });
</script>

@endsection
@section('css_dashboard')
    <style>
        body{
            margin-top:20px;
            background:#FAFAFA;
        }
        .order-card {
            color: #fff;
        }

        .bg-c-blue {
            background: linear-gradient(45deg,#4099ff,#73b4ff);
        }

        .bg-c-green {
            background: linear-gradient(45deg,#2ed8b6,#59e0c5);
        }

        .bg-c-yellow {
            background: linear-gradient(45deg,#FFB64D,#ffcb80);
        }

        .bg-c-pink {
            background: linear-gradient(45deg,#FF5370,#ff869a);
        }


        .card {
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
            box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
            border: none;
            margin-bottom: 30px;
            -webkit-transition: all 0.3s ease-in-out;
            transition: all 0.3s ease-in-out;
        }

        .card .card-block {
            padding: 25px;
        }

        .order-card i {
            font-size: 26px;
        }

        .f-left {
            float: left;
        }

        .f-right {
            float: right;
        }       

    </style>

@endsection