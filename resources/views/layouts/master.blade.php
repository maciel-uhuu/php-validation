<html>

<head>
  <title>UHUU - @yield('title', 'Dashboard')</title>
  <link rel="stylesheet" href="public/vendor/larasort/css/larasort.css">
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