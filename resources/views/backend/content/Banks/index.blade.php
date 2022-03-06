@extends('backend.full')

@section('konten')
{{-- <h1>YO ndak tau</h1> --}}
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Bank</h1>
        </div>
        <div class="section-body">
            <div class="col-12">
                <a href="/bank-payment/create" class=" btn btn-outline-primary mb-3">Tambah Bank</a>
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <button type="button" class="btn btn-outline-primary">Primary</button>
                    <div class="card-header">
                        <h4>Data Bank</h4>
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
                                        <th>Bank</th>
                                        <th>Atas Nama</th>
                                        <th>Nomor Rekening</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($bank as $type)
                                    <tr>
                                        <td>
                                            {{$type->nama_bank}}
                                        </td>
                                        <td>
                                            {{$type->atas_nama}}
                                        </td>
                                        <td>
                                            {{$type->norek}}
                                        </td>
                                        <td>
                                            <form action="/bank-payment/destroy/{{$type->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/bank-payment/edit/{{$type->id}}" class="btn btn-sm btn-primary btn-action" data-toggle="tooltip" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger btn-action" data-toggle="tooltip" title="Hapus"><i
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
