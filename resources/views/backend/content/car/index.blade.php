@extends('backend.full',['title'=>'Mobil'])
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Mobil</h1>
            <div class="section-header-button">
                <a href="/data-mobil/create" class="btn btn-primary">Tambah Mobil</a>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="section-body">
            <h2 class="section-title">Mobil</h2>
            <p class="section-lead">
                You can manage all cars, such as editing, deleting and more.
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card mb-0">
                        <div class="card-body">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#">All <span class="badge badge-white">5</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Ready <span class="badge badge-primary">1</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tidak Ready<span
                                            class="badge badge-primary">1</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semua Mobil</h4>
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
                        <div class="card-body">
                            {{-- <div class="float-left">
                                <select class="form-control selectric">
                                    <option>Action For Selected</option>
                                    <option>Move to Draft</option>
                                    <option>Move to Pending</option>
                                    <option>Delete Pemanently</option>
                                </select>
                            </div>
                            <div class="float-right">
                                <form>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                            <div class="clearfix mb-3"></div>
                            <div class="table-responsive">
                                <table class="table table-striped" style="overflow-x: auto;white-space: nowrap">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Mobil</th>
                                        <th>Gambar</th>
                                        <th>Tipe Mobil</th>
                                        <th>Harga</th>
                                        <th>Denda</th>
                                        <th>Sopir</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                    <?php $no=1 ?>
                                    @foreach ($data as $item)
                                    <tr>
                                        <td>{{$no++}}
                                        </td>
                                        <td>{{$item->nama_mobil}}
                                        </td>
                                        <td>
                                            <div class="chocolat-parent">
                                                <a href="{{asset("/storage/".$item->gambar)}}" class="chocolat-image"
                                                    title="Just an example">
                                                    <div data-crop-image=""
                                                        style="object-fit:cover; object-position:center">
                                                        <img alt="image" src="{{asset("/storage/".$item->gambar)}}"
                                                            class="img-fluid">
                                                    </div>
                                                </a>
                                            </div>
                                            {{-- <img style="height: 70px; object-fit:cover; object-position:center"
                                                src="{{asset("/storage/".$item->gambar)}}" alt="" sizes="10px"
                                            srcset=""> --}}
                                        </td>
                                        <td>
                                            {{$item->type->nama_tipe}}
                                        </td>
                                        <td>{{$item->harga}}</td>
                                        <td>{{$item->denda}}</td>
                                        <td>@switch($item->sopir)
                                            @case('ready')
                                            <div class="badge badge-success">Ready</div>
                                            @break
                                            @case('tidak')
                                            <div class="badge badge-warning">Tidak</div>
                                            @break
                                            @default
                                            @endswitch
                                        </td>
                                        <td>
                                            @switch($item->status)
                                            @case('ready')
                                            <div class="badge badge-success">Ready</div>
                                            @break
                                            @case('tidak')
                                            <div class="badge badge-info">Tidak</div>
                                            @break
                                            @default
                                            @endswitch
                                        </td>
                                        <td>
                                            <div class="row">
                                                <form action="/data-mobil/destroy/{{$item->id}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="/data-mobil/edit/{{$item->id}}"
                                                        class="btn btn-sm btn-primary btn-action" data-toggle="tooltip"
                                                        title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                                    <button type="submit" class="btn btn-sm btn-danger btn-action"
                                                        data-toggle="tooltip" title="Hapus"><i
                                                            class="fas fa-trash"></i></a></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                            {{-- <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('css-image')
<link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css">
@endsection
@push('javascript')
<script src="https://getstisla.com/dist/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="https://getstisla.com/dist/modules/jquery-ui/jquery-ui.min.js"></script>
@endpush
