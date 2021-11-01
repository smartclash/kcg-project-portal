<nav class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ route('index') }}" class="navbar-item">
                {{ config('app.name') }}
            </a>
        </div>
        <div class="navbar-menu">
            <div class="navbar-end">
                @auth
                    <a href="{{ route('auth.logout') }}" class="navbar-item">Logout</a>
                @else
                    <a href="{{ route('login') }}" class="navbar-item">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
