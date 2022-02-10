@extends('backend.full')
@section('konten')
<div class="main-content" style="min-height: 600px;">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Bank</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/bank-payment">Bank</a></div>
                <div class="breadcrumb-item">Form Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <form action="/bank-payment/store" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input type="text" class="form-control @error('nama_bank') is-invalid @enderror"
                                        name="nama_bank" value="">
                                    @error('nama_bank')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Atas Nama</label>
                                    <input type="text" class="form-control @error('atas_nama') is-invalid @enderror"
                                        name="atas_nama" value="">
                                    @error('atas_nama')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nomer Rekening</label>
                                    <input type="text" class="form-control @error('norek') is-invalid @enderror"
                                        name="norek" value="">
                                    @error('norek')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                                <a href="/bank-payment" class=" btn btn-outline-info">kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
