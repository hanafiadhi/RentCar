@extends('backend.full',['title'=>'Detail Invoice'])
@section('konten')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="d-flex justify-content-center">
                <h1>Detail Pesanan</h1>
            </div>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/home">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="/transaksi">Semua Transaksi</a></div>
                <div class="breadcrumb-item">Detail</div>
            </div>
        </div>
    </section>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success') ?? session('upload')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    @if($data->invoice)
                                    <h2>Invoice</h2>
                                    <div class="invoice-number">#{{$data->invoice}}</div>
                                    @else
                                    <h2>Order</h2>
                                    @endif

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <address>
                                            <strong>Atas Nama:</strong><br>
                                            Nama : {{$data->nama}}<br>
                                            Email : {{$data->email}}<br>
                                            No Handphone :{{$data->no_handphone}}<br>
                                        </address>
                                    </div>
                                    <div class="col-md-3">
                                        <strong>Status Booking</strong><br>
                                        @switch($data->status)
                                        @case(1)
                                        <p class="text-danger"><i class="fas fa-credit-card"></i> Belum Bayar</p>
                                        @break
                                        @case(2)
                                        <p class="text-primary"><i class="fas fa-file-invoice-dollar"
                                                style="font-size: 18px"></i> Cek Butki Pembayaran
                                        </p>
                                        @break
                                        @case(3)
                                        <p class="text-success"><i style="font-size: 18px"
                                                class="fas fa-shipping-fast"></i> Rental Berjalan
                                        </p>
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
                                    </div>
                                    @if ($data->bukti_Bayar !== null && $data->status != '4' && $data->status != '5' )
                                    <div class="col-md-5">
                                        <strong>Silahkan Update Sesuai dengan kebutuhan</strong>

                                        <form action="/transaksi/update/{{$data->id}}" class="needs-validation"
                                            novalidate method="post" id="rentalStatus">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" id="updateStatus"
                                                class="custom-select form-control @error('status') is-invalid @enderror">
                                                <option disabled selected value="">Pilih</option>
                                                <option {{$data->status ==2 ? 'selected' : ''}} value="2"> Cek Butki
                                                    Pembayaran</option>
                                                <option {{$data->status ==3 ? 'selected' : ''}} value="3"> Rental
                                                    Berjalan </option>
                                                <option {{$data->status ==5 ? 'selected' : ''}} value="5"> Rental Gagal
                                                </option>
                                            </select>
                                            <br>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <br>
                                        </form>
                                        <button class="btn btn-sm btn-outline-warning" id="reset-btn">Reset</button>
                                        <button id="1122" data-toggle="modal" data-target="#staticBackdrop"
                                            class="btn btn-sm btn-outline-primary" data-toggle="tooltip"
                                            title="update"><i class="fas fa-pen-square"></i> Update
                                            Status</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">konfirmasi
                                                            Status Rental
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-justify text-danger">Apakah Anda Yakin?</p>
                                                        <p id="112233"></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" id="submitmethod"
                                                            class="btn btn-outline-primary"><i
                                                                class="fas fa-pen-square"></i> Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    @endif
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            @if($data->bank()->get('gambar')->count() !== 0)
                                            <img src="{{asset('/bank/'.$data->bank()->get('gambar')->first()->gambar)}}"
                                                style="max-height: 50px">
                                            @else
                                            {{$data->nama_bank}}<br>
                                            @endif
                                        </address>
                                    </div>
                                    <div class="col-md-3">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{\Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM Y') }}<br><br>
                                        </address>
                                    </div>
                                    @if ($data->status == 3 && $data->status != '5')
                                    <div class="col-md-5">
                                        <strong>Pengembalian Rental</strong>
                                        <br>
                                        <span style="color: red;font-size:11px">
                                            {{-- <strong>Rental Selesai Ketika Anda Berhasil Mengisi form di bawah</strong> --}}
                                            <strong>Rental Selesai Ketika Anda Berhasil Mengisi form di bawah</strong>
                                        </span>
                                        <form action="/transaksi/pengembalian/{{$data->id}}" class="needs-validation"
                                            novalidate method="post" id="ReturnDate">
                                            @csrf
                                            <input required type="date" name="tanggal" id="txtDate"
                                                class="form-control @error('tanggal') is-invalid @enderror"">
                                            @error('tanggal')
                                            <span class=" invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <br>
                                        </form>
                                        <button class="btn btn-sm btn-outline-warning"
                                            id="reset-btn-return">Reset</button>
                                        <button type="submit" data-toggle="modal" data-target="#staticBackdrop2"
                                            class="btn btn-sm btn-outline-primary" data-toggle="tooltip"
                                            title="Update Tanggal Pengembalian"><i class="far fa-calendar-alt"></i>
                                            Update
                                            Tanggal</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop2" data-backdrop="static"
                                            data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">konfirmasi
                                                            Tanggal Pengembalian Mobil
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p class="text-justify text-danger">Apakakah Tanggal Sudah
                                                            Benar, Ketika Mobil Kembali?</p>
                                                        <p>Jika anda mengisi form pengembalian rental maka transaksi
                                                            dengan Invoice
                                                            <strong class="text-dark">{{'#'.$data->invoice}}</strong>
                                                            <strong class="text-danger">tidak dapat Lagi di Ubah Lagi
                                                                Tanggal Pengembaliannya</strong>
                                                            harap Bijak mengisi form pengembaliannya
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Tutup</button>
                                                        <button type="submit" id="submitReturn"
                                                            class="btn btn-outline-primary"><i
                                                                class="fas fa-pen-square"></i> Update</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                    @endif
                                    {{-- <div class="col-md-4 text-md-right"> --}}
                                    {{-- <div class="col-md-4 text-md-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{\Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM Y') }}<br><br>
                                    </address>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <section class="section">
                                <div class="section-title">Order Summary</div>
                            </section>
                            <p class="section-lead">All items here cannot be deleted.</p>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-md">
                                    <tr>
                                        <th data-width="40">#</th>
                                        <th>Item</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Tanggal Mulai Rental</th>
                                        <th class="text-center">Tanggal Selesai Rental</th>
                                        <th class="text-center">Durasi</th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>{{$data->mobil }}</td>
                                        <td class="text-center">{{"Rp".number_format($data->harga) ?? ' '}}</td>
                                        <td class="text-center">
                                            {{\Carbon\Carbon::parse($data->start_date)->isoFormat('D MMMM Y') }}
                                        </td>
                                        <td class="text-center">
                                            {{\Carbon\Carbon::parse($data->end_date)->isoFormat('D MMMM Y') }}</td>
                                        <td class="text-center">{{$data->durasi}} Hari</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-8">
                                    @if ($data->bukti_Bayar !== null)
                                    <section class="section">
                                        <div class="section-title">Bukti Pembayaran</div>
                                    </section>
                                    <p class="section-lead">Click Untuk Memperbesar Buktinya
                                    </p>
                                    <div class="chocolat-parent">
                                        <a href="{{asset("/bukti-pembayaran/".$data->bukti_Bayar)}}"
                                            class="chocolat-image" title="Just an example">
                                            <div data-crop-image="" style="object-fit:cover; object-position:center">
                                                {{-- <img alt="image" src="{{asset("/storage/".$data->bukti_Bayar)}}"
                                                class="img-fluid"> --}}
                                                <img alt="image"
                                                    src="{{asset("/bukti-pembayaran/".$data->bukti_Bayar)}}"
                                                    class="img-fluid" style="height:260px">
                                            </div>
                                        </a>
                                    </div>
                                    <br>
                                    <form action="/transaksi/download/{{$data->id}}" method="post">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-dark">Download Bukti
                                            Pembayaran</button>
                                    </form>
                                    @endif
                                </div>
                                <div class="col-lg-4 text-right">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Subtotal</div>
                                        <div class="invoice-detail-value">{{"Rp".number_format($data->harga)}}
                                        </div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Durasi</div>
                                        <div class="invoice-detail-value">{{$data->durasi }} Hari</div>
                                    </div>
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total Bayar</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            {{"Rp".number_format($data->total_bayar)}}
                                        </div>
                                    </div>
                                    @if ($data->status == '4')
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total Denda</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            {{"Rp".number_format($data->total_denda)}}
                                        </div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Tanggal Pengembalian</div>
                                        <div class="invoice-detail-value">{{\Carbon\Carbon::parse($data->return_date)->isoFormat('D MMMM Y') }}</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Lama Pengembalian</div>
                                        <div class="invoice-detail-value">{{$data->durasi_pengembalian }} Hari</div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- </section> --}}
</div>
@endsection
@section('css-image')
<link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css">
@endsection
@push('javascript')
<script src="https://getstisla.com/dist/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
<script src="https://getstisla.com/dist/modules/jquery-ui/jquery-ui.min.js"></script>
<script>
    $(function () {
        var dtToday = new Date();

        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var maxDate = year + '-' + month + '-' + day;

        $('#txtDate').attr('min', maxDate);
        // @if(Session::has('errors'))
        // $('#staticBackdrop2').modal('show');
        // @endif

        $('#submitmethod').click(function () {
            $('#rentalStatus').submit();
        });
        $(document).ready(function () {
            $("#reset-btn").click(function () {
                $("#rentalStatus").trigger("reset");
            });
        });

        $('#submitReturn').click(function () {
            $('#ReturnDate').submit();
        });
        $(document).ready(function () {
            $("#reset-btn-return").click(function () {
                $("#ReturnDate").trigger("reset");
            });
        });
        $('#updateStatus').on('input', function () {
            let get = $("#updateStatus").val();
            // console.log(typeof(get));
            if (get == "5") {
                let jejak =
                    "Jika Anda memilih Rental Gagal Maka setelah Di update Transaksi ini Tidak bisa di UPDATE KEMBALI"
                $("#112233").html('<p>' + jejak + '</p>');
            } else {
                let jejak = ''
                $("#112233").html('<p>' + jejak + '</p>');
            }
        });
    });

</script>
@endpush
