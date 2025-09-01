<!DOCTYPE html>
  <html lang="en" >
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{url('')}}/assets/img/apple-icon.png">
  <link rel="icon" href="/image/logo.png" type="image/x-icon" />
  <title>
    Admin Multikart
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="{{url('')}}/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="{{url('')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{url('')}}/assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="{{url('')}}/assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
  @yield('content')
  <!-- @if(session()->has('success'))
    <div x-data="{ show: true}"
        x-init="setTimeout(() => show = false, 4000)"
        x-show="show"
        class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
      <p class="m-0">{{ session('success')}}</p>
    </div>
  @endif -->
    <!--   Core JS Files   -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{url('')}}/assets/js/core/popper.min.js"></script>
  <script src="{{url('')}}/assets/js/core/bootstrap.min.js"></script>
  <script src="{{url('')}}/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="{{url('')}}/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="{{url('')}}/assets/js/plugins/fullcalendar.min.js"></script>
  <script src="{{url('')}}/assets/js/plugins/chartjs.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{url('')}}/assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
