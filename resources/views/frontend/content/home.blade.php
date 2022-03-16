@extends('frontend.main')
@section('content')

<div class="main-content">
    <div>
        <img class="d-block w-100 card-img" alt="Responsive image" src="{{asset('assets/img/logo.jpg')}}">
    </div>
    <section class="section">
        <div class="col-12 col-md-12 col-lg-12">

            <div class="card card-info">
                <div class="">
                    <h2 class="text-center my-3 text-dark">Kenapa Anda harus menggunakan jasa kami?</h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6  ">
                <img style="border-radius: 20px;max-height: 300px" class="d-block w-100 shadow" alt="Responsive image"
                    src="{{asset('assets/img/example-image.jpg')}}">
            </div>

            <div class="col-sm-12 col-md-6 mx-auto">
                <h3 class="text-dark ">Meyediakan Berbagai <br> Macam Mobil Rental</h3>
                <p class="text-mute">Rental berbagai macam mobil yang kami sediakan sesuai kebutuhan anda sendiri atau
                    sekeluarga</p>
            </div>

        </div>
        <br>
        <hr class="my-3">
        <div class="row align-items-center">

            <div class="col-sm-12 col-md-6 mx-auto">
                <h3 class="text-dark ">Kami siap melayani</h3>
                <ol>
                    <li>
                        <div class="row">
                            <div style="width: 20px;
                                        height: 20px;
                                        line-height: 20px;
                                        border-radius: 50%;
                                        text-align: center;
                                        background-color: #1eff00;
                                        color: #fff;
                                        margin-right: 10px;">
                                <i class="fas fa-check"></i>
                            </div>
                            <p style="font-size: 20px"> Tiket online</p>
                        </div>
                    </li>
                    <li>
                        <div class="row">
                            <div style="width: 20px;
                                        height: 20px;
                                        line-height: 20px;
                                        border-radius: 50%;
                                        text-align: center;
                                        background-color: #1eff00;
                                        color: #fff;
                                        margin-right: 10px;">
                                <i class="fas fa-check"></i>
                            </div>
                            <p style="font-size: 20px"> Reservasion hotel dan resto</p>
                        </div>

                    </li>
                    <li>
                        <div class="row">
                            <div style="width: 20px;
                                        height: 20px;
                                        line-height: 20px;
                                        border-radius: 50%;
                                        text-align: center;
                                        background-color: #1eff00;
                                        color: #fff;
                                        margin-right: 10px;">
                                <i class="fas fa-check"></i>
                            </div>
                            <p style="font-size: 20px"> Transport service</p>
                        </div>

                    </li>
                    <li>
                        <div class="row">
                            <div style="width: 20px;
                                        height: 20px;
                                        line-height: 20px;
                                        border-radius: 50%;
                                        text-align: center;
                                        background-color: #1eff00;
                                        color: #fff;
                                        margin-right: 10px;">
                                <i class="fas fa-check"></i>
                            </div>
                            <p style="font-size: 20px">Over land</p>
                        </div>

                    </li>
                </ol>
            </div>
            <div class="col-sm-12 col-md-6 ">
                <img style="border-radius: 20px;max-height: 300px" class="d-block w-100 shadow" alt="Responsive image"
                    src="{{asset('assets/img/example-image.jpg')}}">
            </div>

        </div>
        <br>
        <hr class="my-3">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="">
                <h2 class="text-center my-3 text-dark">Lokasi kami</h2>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 ">
                <div class="mapouter d-block w-100 shadow">
                    <div class="gmap_canvas "><iframe width="540" height="400" id="gmap_canvas" alt="Responsive image"
                            src="https://maps.google.com/maps?q=Bakpia%20Kukus%20Tugu%20Prawirotaman,%204,%20Jl.%20Parangtritis%20No.KM.0%20No.54,%20Mantrijeron,%20Kec.%20Mantrijeron,%20Kota%20Yogyakarta,%20Daerah%20Istimewa%20Yogyakarta%2055143&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                            href="https://www.embedgooglemap.net/blog/divi-discount-code-elegant-themes-coupon/">divi
                            discount</a><br>
                        <style>
                            .mapouter {
                                position: relative;
                                text-align: right;
                                height: 400px;
                                width: 540px;
                                border-radius: 20px;
                            }

                        </style><a href="https://www.embedgooglemap.net">create a map with google maps</a>
                        <style>
                            .gmap_canvas {
                                overflow: hidden;
                                background: none !important;
                                height: 400px;
                                width: 540px;
                                border-radius: 20px;
                            }

                        </style>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 mx-auto">
                <h3 class="text-dark ">Ngeland Tour & crew</h3>
                <p class="text-mute">Bakpia Kukus Tugu Prawirotaman, 4, Jl. Parangtritis No.KM.0 No.54, Mantrijeron, Kec. Mantrijeron, Kota Yogyakarta, Daerah Istimewa Yogyakarta 55143</p>
                <a href="https://www.google.com/maps/place/Bakpia+Kukus+Tugu+Prawirotaman/@-7.818264,110.36798,13z/data=!4m5!3m4!1s0x0:0x6e0cba113644ddc6!8m2!3d-7.8182637!4d110.3680358?hl=en-US" role="button" target="_blank" rel="noopener noreferrer" class="btn btn-outline-primary">Lihat Lebih Besar</a>
            </div>
        </div>
    </section>
</div>
@endsection
