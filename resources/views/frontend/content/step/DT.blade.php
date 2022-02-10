@extends('frontend.main',['title'=>'Invoice'])
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
            <div class="col-12 col-sm-12 col-lg-12">
                <div class="invoice">
                    <div class="invoice-print">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="invoice-title">
                                    <h2>Order Mobil</h2>
                                    {{-- <div class="invoice-number">Order #12345</div> --}}
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
                    <hr>
                    <div class="text-md-right">
                        <div class="float-lg-left mb-lg-0 mb-3">
                            <!-- Button trigger modal -->
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Apakah Yakin ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- <form action="{{route('stepThree')}}">
                                            <button type="button" class="btn btn-warning"
                                                data-dismiss="modal">Belum</button> &nbsp;
                                            <button type="button" type="submit" class="btn btn-primary"><i
                                                    class="fas fa-credit-card"></i> Lanjut Bayar</button>
                                            </form> --}}
                                            <form action="{{route('stepThree')}}">
                                                {{-- <div class="form-group">
                                                    <label>Tangaal Mulai Rental</label>
                                                    <input type="text" class="form-control datepicker">
                                                </div>
                                                <div class="form-group">
                                                    <label>Tanggal Selesai Rental</label>
                                                    <input type="text" class="form-control datepicker">
                                                </div> --}}
                                                <button type="button" class="btn btn-warning"
                                                data-dismiss="modal">Belum</button>
                                                <button type="submit" class="btn btn-outline-primary"><i
                                                    class="fas fa-credit-card"></i> Process Payment</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#staticBackdrop"><i class="fas fa-credit-card"></i>
                                Process Payment
                            </button>
                            {{-- </form> --}}
                        </div>
                        <form action="/mobil">
                            <button type="submit" class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i>
                                Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- </section> --}}
</div>
@endsection
