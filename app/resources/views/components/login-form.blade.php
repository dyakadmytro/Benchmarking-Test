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
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>
