@extends('frontend.main')
@section('content')
<div class="main-content">
    <section class="section">
        {{-- <div class="section-header">
                        <h1>Top Navigation</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item"><a href="#">Layout</a></div>
                            <div class="breadcrumb-item">Top Navigation</div>
                        </div>
                    </div> --}}
                    <div class="container">
                        <div class="card">
                             <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active">
                            </li>
                            <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" class="img-fluid" alt="Responsive image" src="{{asset('assets/img/example-image.jpg')}}"
                                    alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Heading</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" class="img-fluid" alt="Responsive image" src="{{asset('assets/img/example-image.jpg')}}"
                                    alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Heading</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" class="img-fluid" alt="Responsive image" src="{{asset('assets/img/example-image.jpg')}}"
                                    alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Heading</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                        eiusmod
                                        tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators2" role="button"
                            data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators2" role="button"
                            data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                        </div>
                    </div>
        <div class="col-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Caption</h4>
                </div>
                <div class="card-body">
                   
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">This is Example Page</h2>
                <p class="section-lead">This page is just an example for you to create your own page.</p>
                <div class="card">
                    <div class="card-header">
                        <h4>Example Card</h4>
                    </div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="card-footer bg-whitesmoke">
                        This is card footer
                    </div>
                </div>
            </div>
    </section>
</div>
@endsection
