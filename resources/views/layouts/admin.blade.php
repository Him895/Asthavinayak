<!-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Admin Panel')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('admin-assets/css/style.css') }}">
</head>
<body>
  <div class="d-flex" id="wrapper">

    {{-- Sidebar --}}
    <div class="bg-dark text-white p-3" style="min-height: 100vh; width: 220px;">
      <h4 class="text-center">Admin Panel</h4>
      <hr>
      <ul class="nav flex-column">
        <li class="nav-item">
          <a href="{{ route('dashboard') }}" class="nav-link text-white">Dashboard</a>
        </li>

         <li class="nav-item">
          <a href="{{ route('home-banners.index') }}" class="nav-link text-white">Herosection</a>
        </li>

        <li class="nav-item">
          <a href="{{ route('featuredsection.index') }}" class="nav-link text-white">Featured Section</a>
        </li>

         <li class="nav-item">
          <a href="{{ route('bestdeals.index') }}" class="nav-link text-white">BestDeals Section</a>
        </li>


         <li class="nav-item">
          <a href="{{ route('propertey.index') }}" class="nav-link text-white">Propertey</a>
        </li>
      </ul>
    </div>

    {{-- Page Content --}}
    <div class="flex-grow-1">
      <nav class="navbar navbar-light bg-white border-bottom px-4">
        <span class="navbar-brand mb-0 h4">@yield('title')</span>
      </nav>

      <main class="container py-4">
        @yield('content')
      </main>

      <footer class="text-center text-muted py-3 border-top">
        © {{ date('Y') }} Your Company. All rights reserved.
      </footer>
    </div>
  </div>
</body>
</html> -->
