<!-- resources/views/admin/partials/header.blade.php -->
<header class="bg-white">
  <div class="container">
    <div class="header">
      <nav class="navbar navbar-expand-md navbar-light px-0">
        <a class="navbar-brand d-flex" href="#">
          <img src="{{ asset('admin-assets/images/logos/logo.svg') }}" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto py-3 py-md-0">
            <li class="nav-item pe-0 pe-md-3">
              <a href="#" class="btn btn-outline-primary">Dashboard</a>
            </li>
            <li class="nav-item mt-3 mt-md-0">
              <a href="#" class="btn btn-primary">Logout</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
</header>
