@extends('backend.full')
@section('konten')
<div class="main-content" style="min-height: 600px;">
    <section class="section">
        <div class="section-header">
            <h1>Edit Media</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/sosial-media">Sosial Media</a></div>
                <div class="breadcrumb-item">Form Edit</div>
            </div>
        </div>
        <div class="section-body">
            {{-- <h2 class="section-title">Form Validation</h2>
            <p class="section-lead">
                Form validation using default from Bootstrap 4
            </p> --}}
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="/sosial-media/update/{{$data->id}}" method="post">
                            @csrf
                            @method('patch')
                            {{-- <div class="card-header">
                                <h4>Server-side Validation</h4>
                            </div> --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label>icon</label>
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                        name="icon" value="{{$data->icon}}">
                                    @error('icon')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Media</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="{{$data->nama}}">
                                    @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Url</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        name="url" value="{{$data->url}}">
                                    @error('url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
