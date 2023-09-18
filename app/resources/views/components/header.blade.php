<header class="header py-3">
    <div class="container">
        <div class="row">
            <div class="col">
                <a class="btn" href="{{ route('web.welcome') }}">
                    <h1>Benchmarking test App</h1>
                </a>
            </div>
            <div class="col text-right">
                @if(auth()->guest())
                    <a href="{{ route('web.login') }}" class="btn btn-secondary">Sign In</a>
                    <a href="{{ route('web.register') }}" class="btn btn-primary mr-2">Sign Up</a>
                @else
                    <a href="{{ route('web.logout') }}" class="btn btn-info mr-2">Logout</a>
                @endif
            </div>
        </div>
    </div>
</header>
