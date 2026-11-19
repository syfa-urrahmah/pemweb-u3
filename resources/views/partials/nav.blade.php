<nav class="nav" aria-label="Main Navigation">
    <a href="{{ route('home') }}" class="brand">
        <span class="brand-dot" aria-hidden="true"></span>
        <span>PortalBerita</span>
    </a>

    <a href="{{ route('home') }}"
       class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>

    @auth
        <a href="{{ route('dashboard') }}"
           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
        <a href="{{ route('articles.index') }}"
           class="nav-link {{ request()->routeIs('articles.*') ? 'active' : '' }}">Artikel</a>

        <div class="right">
            <span class="muted">Hi, <strong>{{ auth()->user()->name }}</strong></span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="btn btn-secondary btn-sm">Logout</button>
            </form>
        </div>
    @endauth

    @guest
        <div class="right">
            <a href="{{ route('login') }}"
               class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
            <a href="{{ route('register') }}"
               class="btn btn-primary btn-sm">Register</a>
        </div>
    @endguest
</nav>