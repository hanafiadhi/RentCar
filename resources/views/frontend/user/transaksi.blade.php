@extends('frontend.main',['title'=>'Transaksi Saya'])
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Ku</h1>
        </div>
    </section>
    <div class="section-body">
        {{-- <div class="col-12"> --}}
        {{-- <a href="/tipe-mobil/create" class=" btn btn-outline-primary mb-3">Tambah Tipe</a> --}}
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
                <h4>Transaksi</h4>
                <div class="card-header-form">
                    {{-- <form>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form> --}}
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Nama Mobil</th>
                                <th>Total Sewa</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir </th>
                                <th>Keterangan Order</th>
                                <th>Action</th>
                            </tr>
                            <?php $no=1 ?>
                            @foreach ($tipe as $type)
                            <tr>
                                <td>
                                    {{ $no++}}
                                </td>
                                <td>
                                    {{'#'.$type->invoice}}
                                </td>
                                <td>
                                    {{$type->mobil}}
                                </td>
                                <td>
                                    {{number_format($type->total_bayar)}}
                                </td>
                                <td>
                                    {{$type->start_date}}
                                </td>
                                <td>
                                    {{$type->end_date}}
                                </td>
                                <td>
                                    <p class="text-danger"><i class="fas fa-credit-card"></i> Belum Bayar</p>
                                </td>
                                {{-- <td>
                                            <p class="text-warning"><i class="fas fa-stopwatch"></i> Menunggu Confirmasi admin </p>
                                        </td>
                                        <td>
                                            <p class="text-warning"><i class="fas fa-check"></i> Menunggu Confirmasi admin </p>
                                        </td>
                                        <td>
                                            <p class="text-warning"><i class="fas fa-shipping-fast"></i> Rental Berjalan </p>
                                        </td> --}}
                                <td>
                                    <!-- Button trigger modal -->
                                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#staticBackdrop">
                                            Launch static backdrop modal
                                        </button> --}}
                                    <a href="/my-invoice/{{$type->id}}" class="btn btn-sm btn-info btn-action"
                                        data-toggle="tooltip" title="Details invoice : {{$type->invoice}}"><i
                                            class="fas fa-info-circle"></i></a>
                                    <button type="submit" data-toggle="modal" data-target="#staticBackdrop"
                                        class="btn btn-sm btn-danger btn-action" data-toggle="tooltip" title="Hapus"><i
                                            class="fas fa-trash"></i></a></button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Modal title
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Understood</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- </div> --}}
    </div>
</div>
@endsection
