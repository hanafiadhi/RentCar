@extends('backend.full')
@section('konten')
<div class="main-content" style="min-height: 600px;">
    <section class="section">
        <div class="section-header">
            <h1>Edit tipe mobil</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/tipe-mobil">Tipe Mobil</a></div>
                <div class="breadcrumb-item">Form Edit</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="/tipe-mobil/update/{{$data->id}}" method="post">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Kode tipe</label>
                                    <input type="text" class="form-control @error('kode_tipe') is-invalid @enderror"
                                        name="kode_tipe" value="{{$data->kode_tipe}}">
                                    @error('kode_tipe')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nama Tipe</label>
                                    <input type="text" class="form-control @error('nama_tipe') is-invalid @enderror"
                                        name="nama_tipe" value="{{$data->nama_tipe}}">
                                    @error('nama_tipe')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="/tipe-mobil/" class=" btn btn-outline-info">kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
