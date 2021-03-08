@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image" style="background: url({{ asset('img/login-bg.jpg') }})"></div>

                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"> {{ __('form.login') }} </h1>
                        </div>

                        <form action="{{ route('login') }}" class="user" method="POST">

                            @csrf

                            @if ($errors->any())
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="form-group">
                                <input type="text" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="{{ __('form.your_email') }}" style="color: #000 !important;">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="{{ __('form.your_password') }}" style="color: #000 !important;">
                            </div>

                            <div class="form-group">
                                <div class="custom-control custom-checkbox small">
                                    <input class="custom-control-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="remember">{{ __('form.remember_me') }}</label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('form.login') }}</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
