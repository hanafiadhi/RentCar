@extends('backend.full')
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Transaksi Pelanggan</h1>
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
                    <table class="table table-striped" style="overflow-x: auto;white-space: nowrap">
                        <tbody>
                            <tr>
                                <th>No</th>
                                <th>Invoice</th>
                                <th>Email</th>
                                <th>No Handphone</th>
                                <th>Nama Mobil</th>
                                <th>Total Sewa</th>
                                <th>Durasi</th>
                                <th>Bank di Pilih</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Berakhir </th>
                                <th>Keterangan Order</th>
                                <th>Action</th>
                            </tr>
                            <?php $no=1 ?>
                            @foreach ($data as $item)
                            <tr>
                                <td>
                                    {{$no++}}
                                </td>
                                <td>
                                    {{'#'.$item->invoice}}
                                </td>
                                <td>
                                    {{ Str::limit( $item->email, 13, '...')}}
                                </td>
                                <td>
                                    {{$item->no_handphone}}
                                </td>
                                <td>
                                    {{$item->mobil}}
                                </td>
                                <td>
                                    {{'Rp'.number_format($item->total_bayar)}}
                                </td>
                                <td>
                                    {{$item->durasi . ' Hari'}}
                                </td>
                                <td>
                                    {{$item->nama_bank}}
                                </td>
                                <td>
                                    {{$item->start_date}}
                                </td>
                                <td>
                                    {{$item->end_date}}
                                </td>
                                <td>
                                    @switch($item->status)
                                    @case(1)
                                    <p class="text-danger"><i class="fas fa-credit-card"></i> Belum Bayar</p>
                                    @break
                                    @case(2)
                                    <p class="text-primary"><i class="fas fa-file-invoice-dollar"
                                            style="font-size: 18px"></i> Cek Butki Pembayaran
                                    </p>
                                    @break
                                    @case(3)
                                    <p class="text-success"><i style="font-size: 18px" class="fas fa-shipping-fast"></i>
                                        Rental Berjalan </p>
                                    @break
                                    @case(4)
                                    <p class="text-success"><i style="font-size: 18px" class="far fa-check-circle"></i>
                                        Rental Selesai</p>
                                    @break
                                    @case(5)
                                    <p class="text-danger"><i style="font-size: 18px" class="fas fa-ban"></i> Rental
                                        Gagal</p>
                                    @break
                                    @default
                                    @endswitch
                                </td>
                                <td>
                                    <a href="/transaksi-detail/{{$item->id}}" class="btn btn-sm btn-info btn-action"
                                        data-toggle="tooltip" title="Details invoice : {{$item->invoice ?? ''}}"><i
                                            class="fas fa-info-circle"></i></a>
                                    @if ($item->status == 1 || $item->status == 4 || $item->status ==5)
                                    <a href="#" id="12" data-id="{{$item->id}}" data-toggle="modal"
                                        data-target="#staticBackdrop" class="btn btn-sm btn-danger btn-action"
                                        data-toggle="tooltip" title="Hapus"><i class="fas fa-trash"></i></a></button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Modal -->
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
                            <form action="/transaksi/destroy/{{$item->id ?? ''}}" method="POST" id="delete-form">
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
        </div>
        {{-- </div> --}}
    </div>
</div>
@endsection
@push('javascript')
<script>
    $(document).on('click', '#12', function () {
        let id = $(this).attr('data-id');
        $('#delete-form').attr('action', '/transaksi/destroy/' + id);
    });
</script>
@endpush