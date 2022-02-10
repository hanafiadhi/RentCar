@extends('backend.full',['title'=> 'New Car'])
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Mobil Baru</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/data-mobil">Data Mobil</a></div>
                <div class="breadcrumb-item">Form Tambah</div>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form tambah mobil</h4>
                        </div>
                        <div class="card-body">
                            <form action="/data-mobil/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama
                                        Mobil</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" name="nama_mobil"
                                            value="{{old('nama_mobil')}}">
                                        @error('nama_mobil')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Foto
                                        Mobil</label>
                                    <div class="col-sm-12 col-md-7">
                                        <img id="output" class="img-thumbnail">
                                        <input name="gambar" class="form-control" type="file" accept="image/*"
                                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                        @error('gambar')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat
                                        duduk</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" value="{{old('tempat_duduk')}}" class="form-control" min="2" max="10" name="tempat_duduk">
                                        @error('tempat_duduk')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bagasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" value="{{old('bagasi')}}" class="form-control" min="1" max="10" name="bagasi">
                                        @error('bagasi')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bahan
                                        Bakar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control" value="{{old('bahan_bakar')}}" name="bahan_bakar">
                                        @error('bahan_bakar')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div> --}}
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" value="{{old('harga')}}" min="50000" max="1000000" class="form-control"
                                            name="harga">
                                        @error('harga')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Denda</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="number" value="{{old('denda')}}" min="50000" max="10000000" class="form-control"
                                            name="denda">
                                        @error('denda')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transmisi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="transmisi" class="form-control selectric">
                                            <option disabled selected>Silahkan pilih</option>
                                            <option value="manual">Manual</option>
                                            <option value="semi-otomatis">Semi Otomatis</option>
                                            <option value="otomatis">Otomatis</option>
                                        </select>
                                        @error('transmisi')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="type_id" class="form-control select2">
                                            <option disabled selected>Silahkan pilih</option>
                                            @foreach ($tipe as $item)
                                            <option value="{{$item->id}}">{{$item->nama_tipe}}</option>
                                            @endforeach
                                        </select>
                                        @error('type_id')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fitur</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control select2" multiple name="fitur[]">
                                            {{-- <option disabled selected>Silahkan pilih</option> --}}
                                            @foreach ($fitur as $fitem)
                                            <option value="{{$fitem->id}}">{{$fitem->nama_fitur}}</option>
                                            @endforeach
                                        </select>
                                        @error('fitur')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sopir</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="sopir" class="form-control selectric">
                                            <option disabled selected>Silahkan pilih</option>
                                            <option value="ready">Ada</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                        @error('sopir')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select name="status" class="form-control selectric">
                                            <option disabled selected>Silahkan pilih</option>
                                            <option value="ready">Ready</option>
                                            <option value="tidak">Tidak</option>
                                        </select>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote" name="description">{{old('description')}}</textarea>
                                        @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        {{-- <button type="submit" class="btn btn-primary btn-block">Publish</button> --}}
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <a href="/data-mobil" class=" btn btn-outline-info">kembali</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
