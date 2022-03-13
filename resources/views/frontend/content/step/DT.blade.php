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
                                            Nama : {{Auth::user()->name}}<br>
                                            Email : {{Auth::user()->email}}<br>
                                            No Handphone : +{{Auth::user()->no_handphone}}<br>
                                        </address>
                                    </div>
                                    <div class="col-md-6 text-md-right">
                                        <address>
                                            <strong>Order Date:</strong><br>
                                            {{$data->order}}<br><br>
                                        </address>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <section class="section">
                                    <div class="section-title">Ringkasan Pesanan</div>
                                </section>
                                <p class="section-lead">Semua item di sini tidak dapat dihapus.</p>
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
                                            <td>1</td>
                                            <td>{{$data->mobil }}</td>
                                            <td class="text-center">{{"Rp".number_format($data->harga) ?? ' '}}</td>
                                            <td class="text-center">
                                                {{\Carbon\Carbon::parse($data->start_date)->isoFormat('D MMMM Y') }}
                                            </td>
                                            <td class="text-center">
                                                {{\Carbon\Carbon::parse($data->end_date)->isoFormat('D MMMM Y') }}</td>
                                            <td class="text-right">{{$data->durasi}} Hari</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="modal fade" id="staticBackdrop2" data-backdrop="static"
                                    data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Tentukan Tanggal Rental
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('stepTwo')}}" method="POST"
                                                    class="needs-validation" novalidate>
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$data->id??''}}">
                                                    <div class="form-group">
                                                        <label>Tangaal Mulai Rental</label>
                                                        <input name="start_date" value="{{$data->start_date ??''}}"
                                                            type="date" required id="txtDate"
                                                            class="form-control datepicker">
                                                    </div>
                                                    @error('start_date')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label>Tanggal Selesai Rental</label>
                                                        <input name="end_date" value="{{$data->end_date ??''}}"
                                                            type="date" required id="txtDate2"
                                                            class="form-control datepicker">
                                                    </div>
                                                    @error('end_date')
                                                    <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                    <button type="submit" class="btn btn-outline-success btn-block"><i
                                                            class="fas fa-dolly-flatbed"></i> Booking</button>
                                                    {{-- </form> --}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal"
                                    data-target="#staticBackdrop2"><i class="fas fa-credit-card"></i>
                                    Ganti Tanggal
                                </button>
                                <div class="row mt-4">
                                    <div class="col-lg-8">
                                        <section class="section">
                                            <div class="section-title">Payment Method</div>
                                        </section>
                                        <p class="section-lead">The payment method that we provide is to make it
                                            easier for
                                            you to pay invoices.</p>
                                        <form action="{{route('stepThree')}}" method="post" id="formpayment">
                                            @csrf
                                            @foreach ($bank as $pay)
                                            <label>
                                                <input type="radio" name="bank" value="{{$pay->id}}">
                                                <img src="{{asset('/bank/'.$pay->gambar)}}" style="max-height: 50px">
                                            </label>
                                            @endforeach
                                            @if ($message = Session::get('warning'))
                                            <div class="text-danger">{{$message}}</div>
                                            @endif
                                        </form>
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
                                                {{"Rp".number_format($data->total_bayar) }}
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
                                            <button type="button" class="btn btn-warning"
                                                data-dismiss="modal">Belum</button>
                                            <button type="submit" id="submitmethod" class="btn btn-outline-primary"><i
                                                    class="fas fa-credit-card"></i>
                                                Process Payment</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#staticBackdrop"><i class="fas fa-credit-card"></i>
                                Process Payment
                            </button>
                        </div>
                        <form action="{{route('cancel')}}" method="get">
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
@section('radio')
<style>
    /* HIDE RADIO */
    [type=radio] {
        position: absolute;
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* IMAGE STYLES */
    [type=radio]+img {
        cursor: pointer;
    }

    /* CHECKED STYLES */
    [type=radio]:checked+img {
        outline: 2px solid rgb(12, 130, 241);
    }

</style>
@endsection
@push('js')
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
        $('#txtDate2').attr('min', maxDate);

        @if(Session::has('errors'))
        $('#staticBackdrop2').modal('show');
        @endif

        $('#submitmethod').click(function () {
            $('#formpayment').submit();
        });
    });

</script>
@endpush
