<html>

<head>
  <title>UHUU - @yield('title', 'Dashboard')</title>
  @vite(['resources/css/app.scss', 'resources/css/reset.scss', 'resources/js/app.js'])
</head>

<body>
  <div class="content">
    @yield('content')
  </div>
</body>

</html>