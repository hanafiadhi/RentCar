@extends('layouts.newapp')

@section('content')
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="login-brand"><a href="/">
            <img src="{{asset('/storage/'.\App\website::get('Logo') ?? '')}}" alt="logo" style="max-height: 150px">
        </a>

        {{-- <a href="/">{{\App\website::first()->app_name ?? 'Rental Mobil'}}</a> --}}
    </div>
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="text-dark">Daftar</h4>
            <a href="{{route('login')}}" class="ml-auto">
                <h4>Login</h4>
            </a>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}" class="needs-validation" novalidate>
                @csrf
                <div class=" row">
                    <div class="form-group col-6">
                        <label for="username">User Name</label>
                        <input required id="name" type="text"
                            class="form-control  @error('username') is-invalid @enderror" name="username"
                            value="{{ old('username') }}" autocomplete="username" autofocus tabindex="1">
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="last_name">Name</label>
                        <input required id="last_name" type="text"
                            class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input required id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="row">
                    <div class="form-group col-6">
                        <label for="password" class="d-block">Password</label>
                        <input required id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror pwstrength"
                            data-indicator="pwindicator" name="password" required autocomplete="new-password">
                        <div id="pwindicator" class="pwindicator">
                            <div class="bar"></div>
                            <div class="label"></div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="password2" class="d-block">Password Confirmation</label>
                        <input required id="password2" type="password" class="form-control" name="password_confirmation"
                            autocomplete="new-password">
                    </div>
                </div>

                {{-- <div class="form-divider">
                Your Home
            </div> --}}
                <div class="row">
                    <div class="form-group col-6">
                        <label for="validationCustom04">Gender</label>
                        <select id="validationCustom04" required name="gender"
                            class="custom-select form-control @error('gender') is-invalid @enderror">
                            <option disabled selected value="">Pilih</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label>No WhatsApp</label>
                        <input required name="no_handphone" type="number" value="{{ old('no_handphone') }}"
                            class="form-control @error('no_handphone') is-invalid @enderror">
                        @error('no_handphone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="text-center mt-4 mb-3">
                    <div class="text-job text-muted">Daftar With Social</div>
                </div>
                <div class="row sm-gutters">
                    <div class="col-6">
                        <a class="btn btn-block btn-social btn-facebook">
                            <span class="fab fa-facebook"></span> Facebook
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-block btn-social btn-google">
                            <span class="fab fa-google"></span> Gmail
                        </a>
                    </div>
                </div>
                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection
