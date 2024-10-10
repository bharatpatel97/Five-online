<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin - @yield('tital', 'Five Online Dashboard')</title>
  @include('layout.css')
</head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        @include('layout.header')
      </nav>
      <div class="main-sidebar sidebar-style-2">
        @include('layout.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div> Design By <a href="https://fiveonline.in/">Five Online </a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  @include('layout.script')
</body>
</html>