@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen user</h1>
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
        <div class="card">
            <div class="card-header">
                <h4>Data User</h4>
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
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-md" style="overflow-x: auto;white-space: nowrap">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Dibuat</th>
                            <th>Email Verif</th>
                            <th>Email</th>
                            <th>HandPhone</th>
                            <th>Gender</th>
                            <th>Action</th>
                        </tr>
                        <?php $no=1 ?>
                        @foreach ($admin as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->created_at}} </td>
                            <td>{{$item->email_verified_at}} </td>
                            <td>{{$item->email}}</td>
                            <td>{{'+'.$item->no_handphone}}</td>
                            <td>
                                @if ($item->gender == 'L')
                                <div class="badge badge-success">Laki - Laki</div>
                                @else
                                <div class="badge badge-info">Perempuan</div>
                                @endif
                            </td>
                            <td>
                                <a href="/user-biasa/details/{{$item->id}}" class="btn btn-sm btn-primary btn-action"
                                    data-toggle="tooltip" title="Detail"><i class="fas fa-info-circle"></i></a>
                                <a href="#" id="12" data-id="{{$item->id}}" type="submit" data-toggle="modal"
                                    data-target="#staticBackdrop" class="btn btn-sm btn-danger btn-action"
                                    data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></a></button>
                                <!-- Modal -->

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                            <form action="/user-biasa/destroy/{{$item->id}}" method="POST" id="delete-form">
                                @csrf
                                @method('delete')
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection
@push('javascript')
<script>
    $(document).on('click', '#12', function () {
        let id = $(this).attr('data-id');
        $('#delete-form').attr('action', '/user-biasa/destroy/' + id);
    });
</script>
@endpush
