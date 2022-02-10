@extends('frontend.main',['title'=>'List Mobil'])
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <div class="d-flex justify-content-center">
                <h1>Mobil</h1>
            </div>
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Layout</a></div>
                <div class="breadcrumb-item">Top Navigation</div>
            </div> --}}
        </div>
        <div class="section-body">
            <div class="row">
                @for ($i = 0; $i < 10; $i++) 
                <div class="col-12 col-sm-4 col-4">
                    <div class="card shadow bg-white rounded">

                        {{-- <div class="mb-2 text-muted">Click the picture below to see the magic!</div> --}}
                        <div class="chocolat-parent">
                            <a href="{{asset('assets/img/example-image.jpg')}}" class="chocolat-image"
                                title="Just an example">
                                <div data-crop-image="">
                                    <img alt="image" src="{{asset('assets/img/example-image.jpg')}}" class="img-fluid">
                                </div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="text-dark">Mitsubishi Strada Triton</h6>
                            <div class="card-header-action d-flex justify-content-between">
                                <div class="mb-2 text-muted">MVP</div>
                                <div class="mb-2 text-warning font-weight-bold">Rp500.000</div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <form action="{{route('stepOne')}}">
                                    <button type="submit" class="btn btn-outline-success btn-sm mt-3"><i
                                            class="fas fa-dolly-flatbed"></i> Booking</button> &nbsp;
                                    <a href="{{route('detail')}}" class="btn btn-outline-info btn-sm mt-3"><i
                                            class="fas fa-info-circle"></i> Detail</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </section>
</div>
@endsection
