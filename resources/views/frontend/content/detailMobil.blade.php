@extends('frontend.main',['title'=>'Detail Mobil'])
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="d-flex justify-content-center">
                <h1>Mobil</h1>
            </div>
        </div>
        <div class="section-body">
            <div class="card card-info">
                <div class="d-flex justify-content-between">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 col-6">
                                <div class="chocolat-parent mb-2">
                                    <a href="{{asset('assets/img/example-image.jpg')}}" class="chocolat-image"
                                        title="Just an example">
                                        <div data-crop-image="">
                                            <img alt="image" src="{{asset('assets/img/example-image.jpg')}}"
                                                class="img-fluid">
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-6">
                                <h4 class="text-dark">Mitsubishi Strada Triton</h4>
                                <div class="mb-2 text-muted">MVP</div>
                                <div class="d-flex justify-content-start">
                                    <p class="text-dark mt-3 ">Harga :</p>&nbsp;
                                    <h5 class="text-warning mt-3 font-weight-bold ">Rp500.000 / Hari</h5>
                                </div>
                                <div class="d-flex justify-content-start">
                                    <p class="text-dark mt-2 ">Denda :</p>&nbsp;
                                    <h5 class="text-warning mt-2 font-weight-bold ">Rp500.000</h5>
                                </div>
                                <hr>
                                <div class="cotainer">
                                    <div class="d-flex justify-content-md-between">
                                        <i class="fas fa-cogs"
                                            style="font-size:15px; display: inline-block;border-radius: 30px;box-shadow: 0 0 2px #888;padding: 0.5em 0.6em;">&nbsp;
                                            Transmisi : Manual</i>
                                        <i class="fas fa-suitcase-rolling"
                                            style="font-size:15px; display: inline-block;border-radius: 30px;box-shadow: 0 0 2px #888;padding: 0.5em 0.6em;">&nbsp;
                                            Bagasi : 4</i>
                                        <i class="fas fa-chair"
                                            style="font-size:15px; display: inline-block;border-radius: 30px;box-shadow: 0 0 2px #888;padding: 0.5em 0.6em;">&nbsp;
                                            Tempat Duduk : 8</i>
                                    </div>
                                </div>
                                <hr>
                                <div class="container mt-4">
                                    <div class="d-flex justify-content-between">
                                        <a href="#" class="btn btn-outline-success btn-lg"><i
                                                class="fab fa-whatsapp"></i>WhatsApp</a>
                                        <a href="{{route('stepOne')}}" class="btn btn-info btn-lg"><i class="far fa-check-circle"></i>
                                            Booking</a>
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
                                    <h4>Ketentuan Umum</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="container mt-3">
                                <div class="accordion-body collapse show" id="panel-body-1" data-parent="#accordion">
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
                                <div class="accordion-body collapse" id="panel-body-2" data-parent="#accordion">
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
    </section>
</div>
@endsection
