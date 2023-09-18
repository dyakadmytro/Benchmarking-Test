<div class="col-md-6">
    <div class="card">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form method="POST" action="{{ route('web.login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember">
                    <label class="form-check-label" for="remember_me">
                        Remember Me
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <hr>
                <!-- Google Login Button -->
                <a href="{{ route('social.login', 'google') }}" class="btn btn-danger">Login with Google</a>
            </form>
        </div>
    </div>
</div>
