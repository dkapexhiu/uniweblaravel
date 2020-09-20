<!-- Site Header -->
<header class="site-header">
  <div class="logo">
    <a href="/">
      <img src="{{ asset('spccweb/img/logo.png') }}" alt="SPCC Logo" />
    </a>
  </div>

  <div class="mobile-nav">
    <a href="javascript:void(0);" class="icon" onclick="toggleNavResponsive()">
      <i id="navIcon" class="fa fa-2x fa-bars"></i>
    </a>
  </div>

  <div id="siteNav" class="site-nav">
    <nav class="nav-main">
      <ul>
        <li class="{{ $title == 'Home' ? 'active' : '' }}">
          <a href="/">home</a>
        </li>
        <li class="{{ $title == 'About' ? 'active' : '' }}">
          <a href="/about">about</a>
        </li>
        @if($tot_posts > 0)
        <li class="{{ $title == 'News' ? 'active' : '' }}">
          <a href="/news">news</a>
        </li>
        @endif
        <li class="{{ $title == 'Contact' ? 'active' : '' }}">
          <a href="/contact">contact</a>
        </li>
        @auth()
          <li>
            <a href="/profile">
              Welcome, {{ auth()->user()->getName() }}!
            </a>
          </li>
          <li>
            <a href="{{ route('dashboard') }}">
              Portal
            </a>
          </li>
        @endauth
        @guest()
          <li><a href="{{ route('login') }}">Portal</a></li>
        @endguest
      </ul>
    </nav>
  </div>
</header>
<!-- end Site Header -->