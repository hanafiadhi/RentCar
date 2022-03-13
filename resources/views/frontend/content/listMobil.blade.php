@extends('frontend.main',['title'=>'List Mobil'])
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>{{ $message ?? 'Mobil'}}</h1>
            {{-- <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Components</a></div>
                <div class="breadcrumb-item">Pricing</div>
            </div> --}}
        </div>
        <div class="section-body">
            <h2 class="section-title">Rental Mobil</h2>
            <p class="section-lead">Silahkan Memilih Mobil untuk di Rental sesuai Kebutuhan Anda</p>

            <div class="row">
                @foreach ($car as $item)
                <div class="col-12 col-md-3 col-lg-3">
                    <div class="pricing pricing-highlight">
                        <div class="pricing-title">
                            {{$item->type->nama_tipe}}
                        </div>
                        <div class="chocolat-parent mt-2">
                            <a href="{{asset("/image/".$item->gambar)}}" class="chocolat-image"
                                title="{{$item->nama_mobil}}">
                                <div data-crop-image="" style="object-fit: cover; object-position:center; max-height:255px" >
                                    {{-- <img alt="image" src="{{asset('assets/img/example-image.jpg')}}"
                                    class="img-fluid"> --}}
                                    <img alt="image" src="{{asset("/image/".$item->gambar)}}" class="img-fluid">
                                </div>
                            </a>
                        </div>
                        <div class="mt-2">
                            <div class="pricing-price">
                                {{-- <div>$60</div>
                                <div>per month</div> --}}
                                <h6 class="text-dark">{{$item->nama_mobil}}</h6>
                                <h4 class="text-warning">{{'Rp'.number_format($item->harga)}}</h4>
                            </div>
                            <div class="pricing-details">
                                @if ($item->sopir == 'ready')
                                <div class="pricing-item">
                                    <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                    <div class="pricing-item-label">With Driver</div>
                                </div>
                                {{-- <div class="mt-3"><i class="fas fa-check" style="color: limegreen"></i></div> --}}
                                @else
                                <div class="pricing-item">
                                    <div style="width: 20px;
                                        height: 20px;
                                        line-height: 20px;
                                        border-radius: 50%;
                                        text-align: center;
                                        background-color: #f81717;
                                        color: #fff;
                                        margin-right: 10px;">
                                        <i class="fas fa-ban" style="color: rgb(255, 255, 255);"></i></div>
                                    <div class="pricing-item-label">Without Driver</div>
                                </div>
                                {{-- <div class="mt-3"><i class="fas fa-ban" style="color: red;"></i></div> --}}
                                @endif
                            </div>
                        </div>
                        <div class="pricing-cta">
                            <a href="{{route('detail',$item->id)}}">Booking<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection
