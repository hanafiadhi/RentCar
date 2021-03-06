@extends('layouts.newapp')

@section('content')
<div class="container">
    <div class="login-brand">
    <img src="{{asset('/webset/'.\App\website::get('Logo')->first()->Logo ?? '')}}" alt="logo" style="max-height: 150px">
        {{-- <a href="/">{{\App\website::first()->app_name ?? 'Rental Mobil'}}</a> --}}
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow card-primary">
                <div class="card-header">
                    <h4 class="text-dark">Lupa Password</h4>
                    <a href="{{route('login')}}" class="ml-auto">
                        <h4>Login</h4>
                    </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <p class="text-muted text-center">We will send a link to reset your password
                    </p>
                    <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('Email Kamu') }}</label>

                            <div class="col-md-6">
                                <input id="email" required type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Kirim Link Password Reset') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
