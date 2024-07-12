{{-- @extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="row mb-3">
              <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

              <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                  value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

              <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6 offset-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember')
                    ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                  </label>
                </div>
              </div>
            </div>

            <div class="row mb-0">
              <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                  {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
                </a>
                @endif
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/807f2d6ec6.js" crossorigin="anonymous"></script>

  <title>Admin</title>
</head>

<body class="d-flex flex-column align-items-center pt-5 gap-3" style="width: 100vw; height: 100vh; background-color: #d2d6de !important;">
  <h3 class="text-center mt-3">Admin Panel</h3>
  <main class="bg-white p-3" style="width: 300px;">
    <p class="text-center">Log in</p>
    <form action="/login" method="POST">
      @csrf

      <div class="input-with-icon">
        <input class="form-control --fs-14" type="text" placeholder="Username" name="username">
        <i class="fa-solid fa-envelope --fs-14"></i>
        @error('username')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="input-with-icon mt-3">
        <input class="form-control --fs-14" type="password" placeholder="Password" name="password">
        <i class="fa-solid fa-lock --fs-14"></i>
        @error('password')
          <small class="text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="d-flex justify-content-end align-items-center mt-3">
{{--        <div>--}}
{{--          <input type="checkbox" id="remember">--}}
{{--          <label class="--fs-14" for="remember">Remember me</label>--}}
{{--        </div>--}}
        <button class="btn btn-sm --bg-second text-white" type="submit">Log in</button>
      </div>
    </form>
  </main>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
  </script>
</body>

</html>
