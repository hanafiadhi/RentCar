@extends('frontend.main',['title'=>'Upload Bukti Pembayaran'])
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="d-flex justify-content-center">
                <h1>Booking</h1>
            </div>
        </div>
    </section>
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-sm-8 col-lg-8">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Invoice</h2>
                                    <div class="invoice-number">Order #12345</div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Atas Nama:</strong><br>
                                            Nama : Ujang Maman<br>
                                            Email : UjangManan@gmail.com<br>
                                            No Handphone : +628223924944<br>
                                        </address>
                                    </div>
                                    {{-- <div class="col-md-6 text-md-right">
                                            <address>
                                                <strong>Shipped To:</strong><br>
                                                Muhamad Nauval Azhar<br>
                                                1234 Main<br>
                                                Apt. 4B<br>
                                                Bogor Barat, Indonesia
                                            </address>
                                        </div> --}}
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <address>
                                            <strong>Payment Method:</strong><br>
                                            BCA<br>
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            29 Maret 2022<br><br>
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
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
                                            <th class="text-right">Durasi</th>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Headphone Blitz TDR-3000</td>
                                            <td class="text-center">Rp500.000</td>
                                            <td class="text-center">29 Maret 2022</td>
                                            <td class="text-center">29 Maret 2022</td>
                                            <td class="text-right">2 Hari</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <section class="section">
                                            <div class="section-title">Payment Method</div>
                                        </section>
                                        {{-- <p class="section-lead">The payment method that we provide is to make it
                                                easier for
                                                you to pay invoices.</p> --}}
                                        <div class="d-flex">
                                            <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                                            {{-- <div class="mr-2 bg-jcb" data-width="61" data-height="38"></div>
                                                <div class="mr-2 bg-mastercard" data-width="61" data-height="38"></div>
                                                <div class="bg-paypal" data-width="61" data-height="38"></div> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-4 text-right">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Subtotal</div>
                                            <div class="invoice-detail-value">Rp500.000</div>
                                        </div>
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Durasi</div>
                                            <div class="invoice-detail-value">2 hari</div>
                                        </div>
                                        <hr class="mt-2 mb-2">
                                        <div class="invoice-detail-item">
                                            <div class="invoice-detail-name">Total Bayar</div>
                                            <div class="invoice-detail-value invoice-detail-value-lg">Rp500.000
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">Upload Bukti Pembayaran</h4>
                        {{-- <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                        class="fas fa-minus"></i></a>
                            </div> --}}
                    </div>
                    <div class="card-body">
                        <h6 class="text-center">Invoice :</h6>
                        <h6 class="text-center text-dark">Order#1234</h6>
                        <br>
                        <h6 class="text-center">Transfer Ke</h6>
                        <div class="mr-2 bg-visa" data-width="61" data-height="38"></div>
                        <p class="text-center">Atas Nama: </p>
                        <h6 class="text-center">UjangManan</h6>
                        <h6 class="text-center">No Rek : 8927102826</h6>
                        <hr>
                        <p class="text-center">Total Bayar : </p>
                        <h5 class="text-center text-warning font-weight-bold">Rp500.000</h5>
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
                                    <p class="text-danger">*Jika transfer dengan nominal yang berbeda entah Kurang/Lebih maka itu kesalahan Pelanggan </p>
                                </div>
                            </li>
                        </ul>
                        <div>
                            <br>
                            <p class="text-center"><strong>Upload Bukti Pembayaran</strong></p>
                            <hr>
                            <div>
                                <input name="gambar" class="form-control" type="file" accept="image/*"
                                    onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                                @error('gambar')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="chocolat-parent">
                                    <div data-crop-image="">
                                        <img id="output" class="img-thumbnail" lass="chocolat-image">
                                        {{-- <img alt="image" src="{{asset('assets/img/example-image.jpg')}}"
                                        class="img-fluid"> --}}
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            {{-- <button type="reset" class="btn btn-outline-danger btn-sm mt-3"><i
                                    class="fas fa-dolly-flatbed"></i>Bayar Nanti</button> &nbsp; --}}
                            <a href="/mobil" class="btn btn-outline-success  mt-3 btn-block"><i
                                    class="fas fa-info-circle"></i>Upload bukti</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </section> --}}
</div>
@endsection
