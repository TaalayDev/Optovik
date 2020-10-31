@extends('layouts.app')

@push('styles')
    <link href="/css/login-style.css" rel="stylesheet">
@endpush

@section('content')
    <div class="wrapper fadeInDown" style="background-color: #56baed">
        <div id="formContent">
            <!-- Tabs Titles -->

            <!-- Icon -->
            <div class="fadeIn first" style="margin-bottom: 40px; margin-top: 40px;">
                <img src="/images/149072.png" id="icon" alt="User Icon" style="width: 80px;"/>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <input id="email" type="text" class="@error('email') note-danger @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" placeholder="логин или email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <input id="password" type="password" class="form-controll" name="password"
                       placeholder="пароль" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

                <div class="row">
                    <div class="col-md-6 mt-2 mb-2">
                        <div class="form-check">
                            <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="" for="remember">
                                Запомнить
                            </label>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <input type="submit" class="" value="Вход">

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                Забыли пароль?
                            </a>
                        @endif
                    </div>
                    <div class="col-2"></div>
                </div>
            </form>

        </div>
    </div>
@endsection
