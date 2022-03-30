@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Fitur mobil</h1>
        </div>
        <div class="section-body">
            <div class="col-12">
                <a href="/fitur-mobil/create" class=" btn btn-outline-primary mb-3">Tambah Fitur</a>
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
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>No</th>
                                        <th>Fitur mobil</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $no=1 ?>
                                    @foreach ($fitur as $type)
                                    <tr>
                                        <td>
                                            {{$no++}}
                                        </td>
                                        <td>
                                            {{$type->nama_fitur}}
                                        </td>
                                        <td>
                                            {{-- <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a> --}}
                                            <form action="/fitur-mobil/destroy/{{$type->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <a href="/fitur-mobil/edit/{{$type->id}}" class="btn btn-sm btn-primary btn-action" 
                                                    data-toggle="tooltip"
                                                    title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                <button type="submit" class="btn btn-sm btn-danger btn-action" data-toggle="tooltip"
                                                    title="Hapus"><i
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
