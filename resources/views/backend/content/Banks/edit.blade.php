@extends('backend.full')
@section('konten')
<div class="main-content" style="min-height: 600px;">
    <section class="section">
        <div class="section-header">
            <h1>Edit Bank</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/bank-payment">Bank</a></div>
                <div class="breadcrumb-item">Form Edit</div>
            </div>
        </div>
        <div class="section-body">
            <form action="/bank-payment/update/{{$data->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>Foto Bank</h4>
                                {{-- <div class="section-header-breadcrumb">
                                    <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                                    <div class="breadcrumb-item"><a href="/bank-payment">Bank</a></div>
                                    <div class="breadcrumb-item">Form edit</div>
                                </div> --}}
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <img id="output" src="{{asset("/bank/".$data->gambar)}}" class="img-thumbnail">
                                        <input name="gambar" class="form-control" type="file" accept="image/*"
                                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                        @error('gambar')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Bank</label>
                                    <input type="text" class="form-control @error('nama_bank') is-invalid @enderror"
                                        name="nama_bank" value="{{$data->nama_bank}}">
                                    @error('nama_bank')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Atas Nama</label>
                                    <input type="text" class="form-control @error('atas_nama') is-invalid @enderror"
                                        name="atas_nama" value="{{$data->atas_nama}}">
                                    @error('atas_nama')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Nomer Rekening</label>
                                    <input type="text" class="form-control @error('norek') is-invalid @enderror"
                                        name="norek" value="{{$data->norek}}">
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
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
@endsection
