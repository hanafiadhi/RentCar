@extends('backend.full')
@section('konten')
<div class="main-content" style="min-height: 600px;">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Media</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/sosial-media">Sosial Media</a></div>
                <div class="breadcrumb-item">Form Tambah</div>
            </div>
        </div>
        <div class="section-body">
          
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="/sosial-media/store" method="post">
                            @csrf
                          
                            <div class="card-body">
                                <div class="form-group">
                                    <label>icon</label>
                                    <input type="text" class="form-control @error('icon') is-invalid @enderror"
                                        name="icon" value="">
                                    @error('icon')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Media</label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        name="nama" value="">
                                    @error('nama')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Url</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror"
                                        name="url" value="">
                                    @error('url')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="/sosial-media" class=" btn btn-outline-info">kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
