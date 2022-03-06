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
                @foreach($car as $item)
                <div class="col-12 col-sm-3 col-3">
                    <div class="card shadow bg-white rounded">
                        {{-- <div class="mb-2 text-muted">Click the picture below to see the magic!</div> --}}
                        <div class="chocolat-parent">
                            <a href="{{asset("/image/".$item->gambar)}}" class="chocolat-image"
                                title="Just an example">
                                <div data-crop-image="">
                                    {{-- <img alt="image" src="{{asset('assets/img/example-image.jpg')}}"
                                    class="img-fluid"> --}}
                                    <img alt="image" src="{{asset("/image/".$item->gambar)}}" class="img-fluid">
                                </div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h6 class="text-dark">{{$item->nama_mobil}}</h6>
                            <div class="card-header-action d-flex justify-content-between">
                                <div class="mb-2 text-muted">{{$item->type->nama_tipe}}</div>
                                <div class="mb-2 text-warning font-weight-bold">{{'Rp'.number_format($item->harga)}}
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="btn btn-outline-dark btn-sm mt-3"><i class="fas fa-user-tie"></i> Driver
                                </div>
                                @if ($item->sopir == 'ready')
                                <div class="mt-3"><i class="fas fa-check" style="color: limegreen"></i></div>
                                @else
                                <div class="mt-3"><i class="fas fa-ban" style="color: red;"></i></div>
                                @endif

                                {{-- <div class="mb-2 text-danger">{{$item->sopir=='ready'? 'Sudah Termasuk Driver' : ''}}
                            </div> --}}
                        </div>
                        <hr>
                        <div class="d-flex justify-content-center">
                            <a href="{{route('detail',$item->id)}}" class="btn btn-outline-info btn-sm mt-3"><i
                                    class="fas fa-info-circle"></i> Detail</a>

                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
</div>
</section>
{{-- </div> --}}
@endsection
