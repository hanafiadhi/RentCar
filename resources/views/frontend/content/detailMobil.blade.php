@extends('frontend.main',['title'=>'Detail Mobil'])
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="d-flex justify-content-center">
                <h1>Mobil</h1>
            </div>
        </div>
    </section>
    <div class="section-body">
        <div class="card card-info">
            <div class="d-flex justify-content-between">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-6">
                            <div class="chocolat-parent mb-2">
                                <a href="{{asset("/storage/".$cek->gambar)}}" class="chocolat-image"
                                    title="Just an example">
                                    <div data-crop-image="">
                                        <img alt="image" src="{{asset("/storage/".$cek->gambar)}}" class="img-fluid">
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-6">
                            <h4 class="text-dark">{{$cek->nama_mobil}}</h4>
                            <div class="mb-2 text-muted">{{$cek->type->nama_tipe}}</div>
                            <div class="d-flex justify-content-start">
                                <p class="text-dark mt-3 ">Harga :</p>&nbsp;
                                <h5 class="text-warning mt-3 font-weight-bold ">
                                    {{"Rp".number_format($cek->harga). " / hari"}}</h5>
                            </div>
                            <div class="d-flex justify-content-start">
                                <p class="text-dark mt-2 ">Denda :</p>&nbsp;
                                <h5 class="text-warning mt-2 font-weight-bold ">
                                    {{"Rp".number_format($cek->denda). " / hari"}}</h5>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="mt-3">
                                    <i class="fas fa-user-tie" style="font-size: 20px;color:black;"> Driver : </i>
                                    @if ($cek->sopir == 'ready')
                                    <i class="fas fa-check"  style="color: limegreen; font-size:20px"></i>
                                    @else
                                    <i class="fas fa-ban" style="color: red;font-size:20px"></i>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="cotainer">
                                <div class="d-flex justify-content-md-between">
                                    <i class="fas fa-cogs"
                                        style="font-size:15px; display: inline-block;border-radius: 30px;box-shadow: 0 0 2px #888;padding: 0.5em 0.6em;">&nbsp;
                                        Transmisi :{{$cek->transmisi}}</i>
                                    <i class="fas fa-suitcase-rolling"
                                        style="font-size:15px; display: inline-block;border-radius: 30px;box-shadow: 0 0 2px #888;padding: 0.5em 0.6em;">&nbsp;
                                        Bagasi : {{$cek->bagasi}}</i>
                                    <i class="fas fa-chair"
                                        style="font-size:15px; display: inline-block;border-radius: 30px;box-shadow: 0 0 2px #888;padding: 0.5em 0.6em;">&nbsp;
                                        Tempat Duduk :{{$cek->tempat_duduk}}</i>
                                </div>
                            </div>
                            <hr>
                            <div class="container mt-4">
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-outline-success btn-lg"><i
                                            class="fab fa-whatsapp"></i>WhatsApp</a>

                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Tentukan Tanggal
                                                        Rental
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
                                                        <input type="hidden" name="id" value="{{$cek->id}}">
                                                        <div class="form-group">
                                                            <label>Tangaal Mulai Rental</label>
                                                            <input name="start_date" type="date"
                                                                value="{{old('start_date')}}" required id="txtDate"
                                                                class="form-control">
                                                            @error('start_date')
                                                            <div class="text-danger">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Selesai Rental</label>
                                                            <input name="end_date" type="date"
                                                                value="{{old('end_date')}}" required id="txtDate2"
                                                                class="form-control">
                                                            @error('end_date')
                                                            <div class="text-danger">{{$message}}</div>
                                                            @enderror
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-outline-success btn-block"><i
                                                                class="fas fa-dolly-flatbed"></i>
                                                            order now</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal"
                                        data-target="#staticBackdrop"><i class="far fa-check-circle"></i>
                                        order now
                                    </button>
                                    {{-- <a href="{{route('stepOne')}}" class="btn btn-info btn-lg"><i
                                        class="far fa-check-circle"></i>
                                    Booking</a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section-body">
        <div class="card card-info">
            <div class="card-body">
                <div id="accordion">
                    <div class="d-flex justify-content-center">
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse"
                                data-target="#panel-body-1" aria-expanded="true">
                                <h4>Fitur</h4>
                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse"
                                data-target="#panel-body-2">
                                <h4>Deskripsi</h4>
                            </div>
                        </div>
                        <div class="accordion">
                            <div class="accordion-header" role="button" data-toggle="collapse"
                                data-target="#panel-body-3">
                                <h4>Ketentuan</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container mt-3">
                            <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
                                <p class="mb-0">
                                    @foreach ($cek->fiturs as $item)
                                    <p> {{$item->nama_fitur." "}} <i class="fas fa-check" style="color: limegreen"></i>
                                    </p>
                                    @endforeach
                                </p>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
                                <p class="mb-0">{!!$cek->description!!}
                                </p>
                            </div>
                            <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                    sed do
                                    eiusmod
                                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                    veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                                    esse
                                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
                                    cupidatat
                                    non
                                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
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
        $('#staticBackdrop').modal('show');
        @endif
    });

</script>
@endpush
