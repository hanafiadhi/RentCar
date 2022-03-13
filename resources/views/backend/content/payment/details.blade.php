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
                                    <div class="col-md-4">
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
                                        <p class="text-warning"><i class="fas fa-shipping-fast"></i> Rental Berjalan
                                        </p>
                                        @break
                                        @case(4)
                                        <p class="text-warning"><i class="fas fa-stopwatch"></i> Rental Selesai</p>
                                        @break
                                        @case(5)
                                        <p class="text-warning"><i class="fas fa-stopwatch"></i>Rental Gagal</p>
                                        @break
                                        @default
                                        @endswitch
                                    </div>
                                    @if ($data->bukti_Bayar != 'null')
                                    <div class="col-md-4">
                                        <strong>Silahkan Update Sesuai dengan kebutuhan</strong>
                                        <form action="/transaksi/update/{{$data->id}}" class="needs-validation"
                                            novalidate method="post">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" id="updateStatus"
                                                class="custom-select form-control @error('status') is-invalid @enderror">
                                                <option disabled selected value="">Pilih</option>
                                                <option {{$data->status ==2 ? 'selected' : ''}} value="2"> Cek Butki
                                                    Pembayaran</option>
                                                <option {{$data->status ==3 ? 'selected' : ''}} value="3"> Rental
                                                    Berjalan </option>
                                                <option {{$data->status ==4 ? 'selected' : ''}} value="4"> Rental
                                                    Selesai</option>
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
                                            <button class="btn btn-sm btn-outline-primary" type="submit">Update
                                                Status</button>
                                        </form>
                                        <br>
                                    </div>
                                    @endif
                                </div>
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
                                    <div class="col-md-4">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{\Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM Y') }}<br><br>
                                        </address>
                                    </div>
                                    @if ($data->status == 3 || $data->status == 4 || $data->status == 5)
                                    <div class="col-md-4">
                                        <strong>Pengembalian Rental</strong>
                                        <form action="/transaksi/pengembalian/{{$data->id}}" class="needs-validation"
                                            novalidate method="post">
                                            @csrf
                                            <input required type="date" name="tanggal" id=""
                                                class="form-control @error('tanggal') is-invalid @enderror"">
                                            @error('tanggal')
                                                <span class=" invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                            <br>
                                            <button class="btn btn-sm btn-outline-primary" type="submit">
                                                Kirim
                                            </button>
                                        </form>
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
                                    @if ($data->bukti_Bayar !== 'null')
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
                                    @if ($data->status == 3 || $data->status == 4 || $data->status == 5)
                                    <hr class="mt-2 mb-2">
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Total Denda</div>
                                        <div class="invoice-detail-value invoice-detail-value-lg">
                                            {{"Rp".number_format($data->total_bayar)}}
                                        </div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Tangaal Pengembalian</div>
                                        <div class="invoice-detail-value">29 Maret 2022</div>
                                    </div>
                                    <div class="invoice-detail-item">
                                        <div class="invoice-detail-name">Lama Pengembalian</div>
                                        <div class="invoice-detail-value">{{$data->durasi }} Hari</div>
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
@endpush
