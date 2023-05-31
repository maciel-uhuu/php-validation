<html>

<head>
  <title>UHUU - @yield('title', 'Dashboard')</title>
  @vite(['resources/css/reset.scss', 'resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
  <div class="app_header">
    <nav>
      <span>UHUU Challenge</span>
      <button id="signout_btn">Sair da sessão</button>
    </nav>
  </div>
  <div class="content">
    @yield('content')
  </div>
</body>

</html>