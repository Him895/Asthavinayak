<div class="left-sidebar-pro">
        <nav id="sidebar" class="">

            <div class="sidebar-header">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
                <strong><img src="{{ asset('admin2/assets/img/logo/logosn.png') }}" alt="" /></strong>
            </div>

			<div class="nalika-profile">
				<div class="profile-dtl">
<img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="Profile Image">
<h2>{{ auth()->user()->name ?? 'User' }}</h2>
				</div>
				<div class="profile-social-dtl">
					<ul class="dtl-social">
						<li><a href="#"><i class="icon nalika-facebook"></i></a></li>
						<li><a href="#"><i class="icon nalika-twitter"></i></a></li>
						<li><a href="#"><i class="icon nalika-linkedin"></i></a></li>
					</ul>
				</div>
			</div>

<div class="left-custom-menu-adp-wrap" style="max-height: calc(100vh - 250px); overflow-y: auto;">
  <nav class="sidebar-nav left-sidebar-menu-pro">
    <ul class="metismenu" id="menu1">

      <li>
        <a href="{{ route('admin2.hero.index') }}">
          <i class="fa fa-image"></i>
          <span class="mini-click-non">Herosection</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.home-banner.fetchtable') }}">
          <i class="fa fa-table"></i>
          <span class="mini-click-non">Hero table</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.featuredsection.index') }}">
          <i class="fa fa-star"></i>
          <span class="mini-click-non">Featured Section</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.featuredsection.fetchtable') }}">
          <i class="fa fa-table-cells"></i>
          <span class="mini-click-non">Featured Table</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.bestdeals.index') }}">
          <i class="fa fa-tags"></i>
          <span class="mini-click-non">Bestdeals Section</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.bestdeals.fetchtable') }}">
          <i class="fa fa-list"></i>
          <span class="mini-click-non">Bestdeals Table</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.propertey.index') }}">
          <i class="fa fa-building"></i>
          <span class="mini-click-non">Propertey Section</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.videos.index') }}">
          <i class="fa fa-video"></i>
          <span class="mini-click-non">Videos Section</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.contact.view') }}">
          <i class="fa fa-address-book"></i>
          <span class="mini-click-non">Contact Section</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.contact.fetchtable') }}">
          <i class="fa fa-database"></i>
          <span class="mini-click-non">Contact Table</span>
        </a>
      </li>

      <li>
        <a href="{{ route('admin2.messages.view') }}">
          <i class="fa fa-envelope"></i>
          <span class="mini-click-non">Contact Query</span>
        </a>
      </li>

      <li>
        <a href="widgets.html">
          <i class="fa fa-puzzle-piece"></i>
          <span class="mini-click-non">Widgets</span>
        </a>
      </li>

    </ul>
  </nav>
</div>

        </nav>
    </div>
