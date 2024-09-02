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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

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
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="bg-img">
        <div class="content">
            <header>Iniciar Sesión</header>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="email" id="email" name="email" placeholder="Usuario"  required>
                </div>

                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" id="password" name="password" class="pass-key"
                        placeholder="Contraseña"  required>
                    <span class="show"><i class="fas fa-eye"></i></span>
                </div>
                <div class="pass">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>
                <div class="field">
                    <input type="submit" value="INICIAR">
                </div>
            </form>
            <div class="login">O inicia sesión con</div>
            <div class="links">
                <div class="facebook">
                    <i class="fab fa-facebook-f"><span>Facebook</span></i>
                </div>
                <div class="instagram">
                    <i class="fab fa-instagram"><span>Instagram</span></i>
                </div>
            </div>
            {{-- <div class="signup">No tienes una cuenta?
                <a href="{{ route('register') }}">Regístrate ahora</a>
            </div> --}}
        </div>
    </div>

    <script>
        const pass_field = document.querySelector('.pass-key');
        const showBtn = document.querySelector('.show');
        const eyeIcon = showBtn.querySelector('i');

        showBtn.addEventListener('click', function() {
            if (pass_field.type === "password") {
                pass_field.type = "text";
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
                //showBtn.textContent = " Ocultar";
                showBtn.style.color = "#3498db";
            } else {
                pass_field.type = "password";
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
                //showBtn.textContent = " Mostrar";
                showBtn.style.color = "#222";
            }
        });
    </script>
</body>
</html>