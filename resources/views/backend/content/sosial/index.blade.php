@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Sosial Media</h1>
        </div>
        <div class="section-body">
            <div class="col-12">
                <a href="/sosial-media/create" class=" btn btn-outline-primary mb-3">Tambah Media</a>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="row">
                @foreach ($sosial as $item)
                <div class="col-lg-6">
                    <div class="card card-large-icons">
                        <div class="card-icon bg-primary text-white">
                            {!! $item->icon!!}
                        </div>
                        <div class="card-body">
                            <h4>{{$item->nama}}</h4>
                            <p>{{$item->url}}</p>
                            <div class="d-flex">
                                <form action="/sosial-media/destroy/{{$item->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="/sosial-media/edit/{{$item->id}}" class="ml-auto"><i
                                            class="fas fa-edit"></i>edit</a>
                                </form>
                                <button type="submit" class="ml-auto btn btn-outline-warning">Delete</button>
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
