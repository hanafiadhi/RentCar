@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tipe mobil</h1>
        </div>
        <div class="section-body">
            <div class="col-12">
                <a href="/tipe-mobil/create" class=" btn btn-outline-primary mb-3">Tambah Tipe</a>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Tipe mobil</h4>
                        <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Kode Tipe</th>
                                        <th>Nama Tipe </th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($tipe as $type)
                                    <tr>
                                        <td>
                                            {{$type->kode_tipe}}
                                        </td>
                                        <td>
                                            {{$type->nama_tipe}}
                                        </td>
                                        <td>
                                            <form action="/tipe-mobil/destroy/{{$type->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/tipe-mobil/edit/{{$type->id}}"
                                                    class="btn btn-sm btn-primary btn-action" data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger btn-action"
                                                    data-toggle="tooltip" title="Hapus"><i
                                                        class="fas fa-trash"></i></a></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
