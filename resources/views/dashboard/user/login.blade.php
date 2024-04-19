<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <link href="https://cdn.jsdelivr.net/npm/fastbootstrap@2.2.0/dist/css/fastbootstrap.min.css" rel="stylesheet" integrity="sha256-V6lu+OdYNKTKTsVFBuQsyIlDiRWiOmtC8VQ8Lzdm2i4=" crossorigin="anonymous">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 45px;">
                  <h4>User Login</h4><hr>
                  <form action="{{ route('user.check') }}" method="post" autocomplete="off">
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @if (Session::get('info'))
                    <div class="alert alert-info">
                        {{ Session::get('info') }}
                    </div>
                @endif
                    @csrf
                      <div class="form-group mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ Session::get('verifiedEmail') ? Session::get('verifiedEmail') : old('email') }}">
                          <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                      </div>
                      <div class="form-group mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('password') }}">
                          <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                      </div>
                      <div class="d-flex justify-content-between">
                        <a href="{{ route('user.forgot.password.form') }}">Forgot Password</a>
                        <a href="{{ route('user.register') }}">Create new Account</a>
                     </div>
                      <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary">Login</button>
                      </div>

                  </form>
            </div>
        </div>
    </div>

</body>
</html>
