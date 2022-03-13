@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <h1>General Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">General Settings</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">All About General Settings</h2>
            <p class="section-lead">
                You can adjust all general settings here
            </p>
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{session('success')}}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div id="output-status"></div>
            <div class="row">
                <div class="col-md-8 col-lg-12">
                    <form id="setting-form" action="{{route('YNTKTS')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                        <div class="card" id="settings-card">
                            <div class="card-header">
                                <h4>General Settings</h4>
                            </div>
                            <div class="card-body">
                                <p class="text-muted">General settings such as, site title, site description, address
                                    and so on.</p>
                                <div class="form-group row align-items-center">
                                    <label for="site-title" class="form-control-label col-sm-3 text-md-right">Site
                                        Title</label>
                                    <div class="col-sm-6 col-md-9">
                                        <input type="text" name="app_name" class="form-control" id="site-title"
                                            value="{{$data[0]["app_name"] ?? old('app_name')}}">
                                        @error('app_name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label for="site-description" class="form-control-label col-sm-3 text-md-right">Site
                                        Description</label>
                                    <div class="col-sm-6 col-md-9">
                                        <textarea class="form-control" name="site_desciption"
                                            id="site-description">{{$data[0]["site_desciption"] ?? old('site_desciption')}}</textarea>
                                        @error('site_desciption')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">Site Logo</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <img id="output" class="img-thumbnail rounded mx-auto d-block"
                                                style="max-height:250px;object-fit:fill; object-position:center"
                                                @isset($data[0]) src="{{asset("/webset/".$data[0]['Logo'])}}" @endisset
                                                class="img-thumbnail">
                                            <input name="Logo" class="form-control" type="file" accept="image/*"
                                                onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB
                                        </div>
                                        @error('Logo')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row align-items-center">
                                    <label class="form-control-label col-sm-3 text-md-right">favicon</label>
                                    <div class="col-sm-6 col-md-9">
                                        <div class="custom-file">
                                            <img id="outputfavicon" class="img-thumbnail rounded mx-auto d-block"
                                                style="max-height: 100px;object-fit:cover; object-position:center"
                                                @isset($data[0]) src="{{asset("/webset/".$data[0]['favicon'])}}"
                                                @endisset class="img-thumbnail">
                                            <input name="favicon" class="form-control" type="file" accept="image/*"
                                                onchange="document.getElementById('outputfavicon').src = window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="form-text text-muted">The image must have a maximum size of 1MB
                                        </div>
                                        @error('favicon')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-whitesmoke text-md-right">
                                <button class="btn btn-primary" id="save-btn">Save Changes</button>
                                <button class="btn btn-secondary" type="button">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
