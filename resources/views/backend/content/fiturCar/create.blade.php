@extends('backend.full')
@section('konten')
<div class="main-content" style="min-height: 600px;">
    <section class="section">
        <div class="section-header">
            <h1>Tambah fitur mobil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/fitur-mobil">Fitur Mobil</a></div>
                <div class="breadcrumb-item">Form Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="/fitur-mobil/store" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama fitur</label>
                                    <input type="text" class="form-control @error('nama_fitur') is-invalid @enderror"
                                        name="nama_fitur" value="">
                                    @error('nama_fitur')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="/fitur-mobil" class=" btn btn-outline-info">kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
