@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Manajemen user</h1>
        </div>
    </section>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Data admin</h4>
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
                                <form action="/user-biasa/destroy/{{$item->id}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <a href="/user-biasa/details/{{$item->id}}"
                                        class="btn btn-sm btn-primary btn-action" data-toggle="tooltip"
                                        title="Detail"><i class="fas fa-info-circle"></i></a>
                                    <button type="submit" class="btn btn-sm btn-danger btn-action" data-toggle="tooltip"
                                        title="Hapus"><i class="fas fa-trash"></i></a></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            </section>
        </div>
    </div>
</div>
@endsection
