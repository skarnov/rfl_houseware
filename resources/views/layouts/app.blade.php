<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  <meta name="description" content="">
  <meta name="author" content="Shaik Obydullah - 3DEVs IT Ltd.">
  <!-- FAVICON -->
  <link rel="icon" href="{{ URL('/assets/favicon.ico') }}" type="image/x-icon">
  <!-- VENDOR CSS -->
  <link rel="stylesheet" href="{{ URL('/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL('/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
  <!-- MAIN CSS -->
  <link rel="stylesheet" href="{{ URL('/assets/css/main.css') }}">
  <link rel="stylesheet" href="{{ URL('/assets/css/color_skins.css') }}">
</head>

<body class="theme-orange">
  <!-- WRAPPER -->
  <div id="wrapper">
    <div class="vertical-align-wrap">
      <div class="vertical-align-middle auth-main">
        <div class="auth-box">
          <div class="top">
            <img src="{{ URL('/assets/images/rfllogo.png') }}" alt="Lucid">
          </div>
          <div class="card">
            <div class="header">
              <p class="lead">Login To Your Account</p>
            </div>
            <div class="body">
              @yield('content')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END WRAPPER -->
</body>
</html>
