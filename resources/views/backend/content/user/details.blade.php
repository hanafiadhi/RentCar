@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User Profil</h1>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="section-body">
            <div class="row">
                <div class="col-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Data Diri</h4>
                        </div>
                        <div class="card-body">
                            <form action="#" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                        name="username" value="{{$admin->username}}">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{$admin->name}}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>No Handphone</label>
                                    <input type="text" class="form-control @error('no_handphone') is-invalid @enderror"
                                        name="no_handphone" value="{{$admin->no_handphone}}">
                                    @error('no_handphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" class="form-control @error('no_handphone') is-invalid @enderror"
                                        name="no_handphone"
                                        value="{{$admin->gender == 'L' ? 'Laki - Laki' : 'Perempuan'}}">
                                    {{-- <select name="gender" class="form-control selectric" @error('gender') is-invalid @enderror>
                                        <option {{$admin->gender == 'L' ? 'selected' : ''}} value="L">Laki - Laki
                                    </option>
                                    <option {{$admin->gender == 'P' ? 'selected' : ''}} value="P">Perempuan</option>
                                    </select> --}}
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" readonly value="{{$admin->email}}">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="/user-biasa" class=" btn btn-outline-info">kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h4>Ganti Password</h4>
                        </div>
                        <div class="card-body">
                            <form action="/user-admin/updatePassword" method="POST">
                                @csrf
                                @method('patch')
                                <div class="form-group">
                                    <label for="old_password">{{ __('Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('old_password') is-invalid @enderror"
                                        name="old_password" autocomplete="new-password">
                                    @error('old_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">{{ __('New Password') }}</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password-confirm" class="">{{ __('Confirm Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" autocomplete="new-password">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>My Picture</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-2 text-muted">Click the picture below to see the magic!</div>
                            <div class="chocolat-parent">
                                <a href="../dist/img/example-image.jpg" class="chocolat-image" title="Just an example">
                                    <div data-crop-image="285">
                                        <img alt="image" src="../dist/img/example-image.jpg" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
    </section>
</div>
@endsection
