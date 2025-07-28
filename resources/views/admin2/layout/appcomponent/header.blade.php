<div class="all-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="logo-pro">
                    <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                </div>
            </div>
        </div>
    </div>
    <div class="header-advance-area">
        <div class="header-top-area">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="header-top-wraper">
                            <div class="row">
                                <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                    <div class="menu-switcher-pro">
                                        <button type="button" id="sidebarCollapse"
                                            class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="icon nalika-menu-task"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                    <div class="header-top-menu tabl-d-n hd-search-rp">
                                        <div class="breadcome-heading">
                                            <form role="search" class="">
                                                <input type="hidden" placeholder="Search..." class="form-control">
                                                <a href=""><i class=""></i></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="header-right-info">
                                        <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                            <li class="nav-item dropdown">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                    class="nav-link dropdown-toggle"><i class="icon nalika-mail"
                                                        aria-hidden="true"></i>
                                                        @php
                                                        $message = \App\Models\Message::where('is_read','==', 0)->count();
                                                        @endphp

                                                        @if ($message)
      <span
        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        {{ $message }}
        <span class="visually-hidden">unread messages</span>
      </span>
    @endif
                                                <div role="menu"
                                                    class="author-message-top dropdown-menu animated zoomIn">
                                                    <div class="message-single-top">
                                                        <h1>Message</h1>
                                                    </div>
                                                    <ul class="message-menu">
                                                        @forelse($headerMessages as $msg)
                                                            <li>
                                                                <a href="{{ route('admin2.messages.view') }}">
                                                                    <div class="message-img">
                                                                        <img src="{{ asset('img/contact/1.jpg') }}" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span
                                                                            class="message-date">{{ $msg->created_at->format('d M') }}</span>
                                                                        <h2>{{ $msg->name }}</h2>
                                                                        <p>{{ Str::limit($msg->message, 30) }}</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @empty
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-content">
                                                                        <p>No messages yet</p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        @endforelse
                                                    </ul>

                                            
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false"
                                                    class="nav-link dropdown-toggle">
                                                    <i class="icon nalika-user"></i>
                                                    @if(Auth::check())
  <span class="admin-name">{{ Auth::user()->name }}</span>
@endif

                                                    <i class="icon nalika-down-arrow nalika-angle-dw"></i>
                                                </a>
                                                <ul role="menu"
                                                    class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                    <li><a href="{{ route('register') }}"><span
                                                                class="icon nalika-home author-log-ic"></span>
                                                            Register</a>
                                                    </li>
                                                    <li><a href="{{ route('profile.form') }}"><span class="icon nalika-user author-log-ic"></span>
                                                            My Profile</a>
                                                    </li>
                                                    <li><a href="lock.html"><span
                                                                class="icon nalika-diamond author-log-ic"></span>
                                                            Lock</a>
                                                    </li>
                                                    <li><a href="{{ route('settings') }}"><span
                                                                class="icon nalika-settings author-log-ic"></span>
                                                            Settings</a>
                                                    </li>
                                                   <li>
  <a href="#"
     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <span class="icon ..."></span> Log Out
  </a>
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
  </form>
</li>

                                                </ul>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
