@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Settings</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Settings</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Overview</h2>
            <p class="section-lead">
                Organize and adjust all settings sosial media.
            </p>
            <a href="/sosial-media/create" class=" btn btn-outline-primary mb-3">Tambah Media</a>
            <div class="row">
                @foreach ($sosial as $item)
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            {!! $item->icon!!}
                        </div>
                        <div class="card-body">
                            <h4>{{$item->nama}}</h4>
                            <p>{{ Str::limit($item->url, 74, '...') }}</p>
                            <div class="row">
                                <div class="col-6"> <a href="/sosial-media/edit/{{$item->id}}" class="ml-auto"><i
                                            class="fas fa-edit"></i>edit</a></div>
                                <div class="col-6 ml-auto">
                                    <form action="/sosial-media/destroy/{{$item->id}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="ml-auto btn btn-outline-warning">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
