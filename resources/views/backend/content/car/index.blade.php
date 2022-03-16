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
    </section>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="section-body">
        <section class="section">
            <h2 class="section-title">Mobil</h2>
            <p class="section-lead">
                You can manage all cars, such as editing, deleting and more.
            </p>
        </section>
        {{-- <div class="row">
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
                                <a class="nav-link" href="#">Tidak Ready<span class="badge badge-primary">1</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Semua Mobil</h4>
                        {{-- <div class="card-header-form">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div> --}}
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
                                    <td>{{ Str::limit($item->nama_mobil,13, '...') }}
                                    </td>
                                    <td>
                                        <div class="chocolat-parent">
                                            <a href="{{asset("/image/".$item->gambar)}}" class="chocolat-image"
                                                title="Just an example">
                                                <div data-crop-image=""
                                                    style="object-fit:cover; object-position:center">
                                                    {{-- <img alt="image" src="{{asset("/storage/".$item->gambar)}}"
                                                    class="img-fluid"> --}}
                                                    <img alt="image" src="{{asset("/image/".$item->gambar)}}"
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
                                    <td>{{"Rp".$item->harga}}</td>
                                    <td>{{"Rp".$item->denda}}</td>
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
                                        <a href="/data-mobil/edit/{{$item->id}}"
                                            class="btn btn-sm btn-primary btn-action" data-toggle="tooltip"
                                            title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <a href="#" data-id="{{ $item->id }}" id="12" data-toggle="modal"
                                            data-target="#staticBackdrop" class="btn btn-sm btn-danger btn-action"
                                            data-toggle="tooltip" title="Hapus"><i
                                                class="fas fa-trash"></i></a></button>
                                        <!-- Modal -->

                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">konfirmasi
                                            penghapusan
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-justify text-danger">Apakah Anda Yakin Ingin
                                            menghapusnya?</p>
                                        <form action="/data-mobil/destroy/{{$item->id}}" method="POST" id="delete-form"
                                            delete-form"">
                                            @csrf
                                            @method('delete')
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('css-image')
<link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css">
@endsection
@push('javascript')
<script src="https://getstisla.com/dist/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="https://getstisla.com/dist/modules/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(document).on('click', '#12', function () {
        let id = $(this).attr('data-id');
        $('#delete-form').attr('action', '/data-mobil/destroy/' + id);
    });
</script>
@endpush
