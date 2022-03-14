@extends('frontend.main',['title'=>'Detail Invoice'])
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="d-flex justify-content-center">
                <h1>{{$message ?? 'Detail Pesanan'}}</h1>
            </div>
        </div>
    </section>
    @if (session('success') || session('upload'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{session('success') ?? session('upload')}}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="section-body">
        <div class="row">
            <div class="col-12 {{$data->status != 1 ? '' : 'col-sm-8 col-lg-8' }}">
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
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Atas Nama:</strong><br>
                                            Nama : {{$data->nama}}<br>
                                            Email : {{$data->email}}<br>
                                            No Handphone :{{$data->no_handphone}}<br>
                                        </address>
                                    </div>
                                    <div class="ml-auto">
                                        <strong>Status Booking</strong><br>
                                        @switch($data->status)
                                        @case(1)
                                        <p class="text-danger"><i style="font-size: 18px"
                                                class="fas fa-credit-card"></i> Belum Bayar</p>
                                        @break
                                        @case(2)
                                        <p class="text-primary"><i class="fas fa-file-invoice-dollar"
                                                style="font-size: 18px"></i> Menunggu Confirmasi
                                            admin
                                        </p>
                                        @break
                                        @case(3)
                                        <p class="text-success"><i style="font-size: 18px"
                                                class="fas fa-shipping-fast"></i>
                                            Rental Berjalan </p>
                                        @break
                                        @case(4)
                                        <p class="text-success"><i style="font-size: 18px"
                                                class="far fa-check-circle"></i>
                                            Rental Selesai</p>
                                        @break
                                        @case(5)
                                        <p class="text-danger"><i style="font-size: 18px" class="fas fa-ban"></i> Rental
                                            Gagal</p>
                                        @break
                                        @default
                                        @endswitch
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
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
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{\Carbon\Carbon::parse($data->created_at)->isoFormat('D MMMM Y') }}<br><br>
                                        </address>
                                    </div>
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
                                        @if ($data->status == '4')
                                        {{-- <hr class="mt-2 mb-2"> --}}
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total Denda</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">
                                                {{"Rp".number_format($data->total_bayar)}}
                                            </div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Tanggal Pengembalian</div>
                                            <div class="invoice-detail-value">29 Maret 2022</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Lama Pengembalian</div>
                                            <div class="invoice-detail-value">{{$data->durasi }} Hari</div>
                                        </div>
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
                                                {{"Rp".number_format($data->harga*$data->durasi)}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($data->status == '1')
            <div class="col-12 col-sm-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">Upload Bukti Pembayaran</h4>

                    </div>
                    <div class="card-body">

                        <h6 class="text-center">Transfer Ke Bank :</h6>
                        @if($data->bank()->get('gambar')->count() !== 0)
                        <div class="d-flex justify-content-center">
                            <img src="{{asset('/bank/'.$data->bank()->get('gambar')->first()->gambar)}}"
                                style="max-height: 50px">
                        </div>
                        @else
                        <h6 class="text-center">{{$data->nama_bank}}</h6>
                        @endif
                        <p class="text-center">Atas Nama: </p>
                        <h6 class="text-center">{{$data->atas_nama}}</h6>
                        <h6 class="text-center">No Rek : {{$data->norek}}</h6>
                        <hr>
                        <p class="text-center">Total Bayar : </p>
                        <h5 class="text-center text-warning font-weight-bold">
                            {{"Rp".number_format($data->total_bayar)}}</h5>
                        <br>

                        <ul class="list-group">
                            <li class="list-group-item">
                                <p>
                                    <a class="guide td-none text-dark fz-14" data-toggle="collapse" href="#atm"
                                        role="button" aria-expanded="false" aria-controls="collapseExample">
                                        Panduan <strong>Transfer Bank</strong>
                                    </a>
                                </p>
                                <div class="collapse" id="atm">
                                    <p>1. Pastikan Transfer ke nomor Rekening dan Atas Nama di atas</p>
                                    <p>2. Transfer ke bank sesuai Nominal Yang Sudah Di tentukan</p>
                                    <p>3. Screen Shoot atau Simpan Bukti Pembayaran</p>
                                    <p>4. Upload Bukti Pembayaran</p>
                                    <p class="text-danger">*Jika transfer selain ke nomor Rekening dan Atas Nama
                                        maka itu kesalahan Pelanggan </p>
                                    <p class="text-danger">*Jika transfer dengan nominal yang berbeda entah Kurang/Lebih
                                        maka itu kesalahan Pelanggan </p>
                                </div>
                            </li>
                        </ul>

                        <div>
                            <br>
                            <p class="text-center"><strong>Upload Bukti Pembayaran</strong></p>
                            <hr>
                            <div>
                                <form action="{{route('stepFour')}}" method="post" id="formUpload"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <input required name="gambar" class="form-control" type="file" accept="image/*"
                                        onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                    @error('gambar')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </form>
                                <div class="chocolat-parent">
                                    <div data-crop-image="">
                                        <img id="output" class="img-thumbnail" lass="chocolat-image">

                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        {{-- 
                        <div class="d-flex justify-content-center">
                            <button type="reset" class="btn btn-outline-danger btn-sm mt-3"><i
                                class="fas fa-dolly-flatbed"></i>Bayar Nanti</button> &nbsp;
                            <a href="/mobil" class="btn btn-outline-success  mt-3 btn-block"><i
                                class="fas fa-info-circle"></i>Upload bukti</a>
                        </div> --}}
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-outline-primary  mt-3 btn-block" data-toggle="modal"
                            data-target="#staticBackdrop">
                            <i class="fas fa-credit-card"></i> Upload bukti
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Silahkan Kirim Bukti Pembayaran
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-danger">Sebelum mengirim Pastikan gambar yang di Upload sudah
                                            Benar dengan ketentuan jika tidak maka User akan di Ban</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-dark"
                                            data-dismiss="modal">Belum</button>
                                        <button type="button" id="sendForm" class="btn btn-outline-success">Kirim
                                            Bukti</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    {{-- </section> --}}
</div>
@endsection
@push('js')
<script>
    $(function () {
        $('#sendForm').click(function () {
            $('#formUpload').submit()
        })

    })
    // @if((session('success')))
    // Swal.fire({
    //     icon: 'success',
    //     title: "{{session('success')}}",
    //     text: 'Silahkan Lanjut Membayar!',
    // })
    // @endif
    // @if((session('upload')))
    // Swal.fire({
    //     icon: 'success',
    //     title: "{{session('upload')}}",
    //     text: 'Kami akan menghubungi Anda Secepatnya!',
    // })
    // @endif

</script>
@endpush
