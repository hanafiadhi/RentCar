@extends('frontend.main',['title'=>'Tanggal Pesanan'])
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="d-flex justify-content-center">
                <h1>Booking</h1>
            </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Mobil yang di pilih</h4>
                            <div class="card-header-action">
                                <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i
                                        class="fas fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="collapse show" id="mycard-collapse">
                            <div class="card-body">
                                <div class="chocolat-parent">
                                    <a href="{{asset('assets/img/example-image.jpg')}}" class="chocolat-image"
                                        title="Just an example">
                                        <div data-crop-image="">
                                            <img alt="image" src="{{asset('assets/img/example-image.jpg')}}"
                                                class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="card-footer">
                                <h4 class="text-dark">Mitsubishi Strada Triton</h4>
                                <div class="card-header-action d-flex justify-content-between">
                                    <h6 class="mb-2 text-muted">MVP</h6>
                                    <h6 class="mb-2 text-warning font-weight-bold">Rp500.000</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Data Diri</h4>
                            <div class="card-header-action">
                                <a data-collapse="#myidentity-collapse" class="btn btn-icon btn-info" href="#"><i
                                        class="fas fa-minus"></i></a>
                            </div>
                        </div>
                        <div class="card-body show" id="myidentity-collapse">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No Telfon</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        {{-- <div class="card-footer">
                            Card Footer
                        </div> --}}
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-dark">Detail Pesanan Mobil</h4>
                        </div>
                        <div class="card-body">
                            {{-- <div class="d-flex justify-content-center"> --}}
                            <form action="{{route('stepTwo')}}">
                                <div class="form-group">
                                    <label>Tangaal Mulai Rental</label>
                                    <input type="text" class="form-control datepicker">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai Rental</label>
                                    <input type="text" class="form-control datepicker">
                                </div>
                                <button type="submit" class="btn btn-outline-success btn-block"><i
                                        class="fas fa-dolly-flatbed"></i> Booking</button>
                            </form>
                            {{-- <a href="{{route('detail')}}" class="btn btn-outline-info btn-sm mt-3"><i
                                class="fas fa-info-circle"></i> Detail</a> --}}
                        </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
