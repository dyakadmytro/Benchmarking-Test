<div class="col-md-6">
    <div class="card">
        <div class="card-header">Register</div>
        <div class="card-body">
            <form method="POST" action="{{ route('web.register') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Verify Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Verify password" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <hr>
                <a href="{{ route('social.login', 'google') }}" class="btn btn-danger">Register with Google</a>
            </form>
        </div>
    </div>
</div>
