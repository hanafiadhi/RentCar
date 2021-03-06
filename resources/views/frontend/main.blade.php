<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ \App\website::get('app_name')->first()->app_name ?? 'Rental Mobil'}} | {{$title ?? ''}}</title>
    <meta name="description"
        content="{{\App\website::get('site_desciption')->first()->site_desciption ?? 'Rental Mobil'}}">
    <link rel="icon" type="image/x-icon"
        href="{{ \App\website::get('favicon')->first() ? asset('/webset/'.\App\website::get('favicon')->first()->favicon) : ''}}">
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="https://getstisla.com/dist/modules/chocolat/dist/css/chocolat.css">
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'> --}}
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    @yield('radio')
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="/" class="navbar-brand sidebar-gone-hide">
                    <img src="{{asset('/webset/'.\App\website::get('Logo')->first()->Logo ?? '')}}"
                        style="max-height: 70px" alt="" srcset="">
                    {{-- {{\App\website::first()->app_name ?? 'Rental Mobil'}}</a> --}}
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
                <div class="nav-collapse">
                    <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
                        <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <ul class="navbar-nav">
                        @foreach (\App\Sosial::get() as $item)
                        <li class="nav-item"><a href="{{$item->url}}"
                                class="nav-link">{!!$item->icon!!}&nbsp;{{$item->nama}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                {{-- <form class="form-inline ml-auto">
                    <ul class="navbar-nav">
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                        <div class="search-backdrop"></div>
                        <div class="search-result">
                            <div class="search-header">
                                Histories
                            </div>
                            <div class="search-item">
                                <a href="#">How to hack NASA using CSS</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">Kodinger.com</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-item">
                                <a href="#">#Stisla</a>
                                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                            </div>
                            <div class="search-header">
                                Result
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="assets/img/products/product-3-50.png"
                                        alt="product">
                                    oPhone S9 Limited Edition
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="assets/img/products/product-2-50.png"
                                        alt="product">
                                    Drone X2 New Gen-7
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <img class="mr-3 rounded" width="30" src="assets/img/products/product-1-50.png"
                                        alt="product">
                                    Headphone Blitz
                                </a>
                            </div>
                            <div class="search-header">
                                Projects
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-danger text-white mr-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    Stisla Admin Template
                                </a>
                            </div>
                            <div class="search-item">
                                <a href="#">
                                    <div class="search-icon bg-primary text-white mr-3">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    Create a new Homepage Design
                                </a>
                            </div>
                        </div>
                    </div>
                </form> --}}
                <ul class="navbar-nav navbar-right ml-auto">
                    <li class=""><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle"></a>
                    </li>
                    <li class=""><a href="#" data-toggle="dropdown"
                            class="nav-link notification-toggle nav-link-lg"></a>
                    </li>
                    @guest
                    <li class="nav-item active"><a href="{{route('login')}}" class="nav-link beep"> Login</a></li>
                    <li class="nav-item active"><a href="{{route('register')}}" class="nav-link beep">Register</a></li>
                    @endguest
                    @auth
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{asset('assets/img/avatar/avatar-1.png')}}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"> {{ Auth::user()->name ?? 'Admin'  }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @if (Auth::user()->email_verified_at == null)
                            <a href="/email/verify" class="dropdown-item has-icon beep">
                                <i class="fa-solid fa-hand-holding-heart"></i> Verifikasi Akun
                            </a>
                            @endif
                            @role('admin')
                            <a href="/home" class="dropdown-item has-icon beep">
                                <i class="fas fa-chalkboard-teacher"></i>Dashboard
                            </a>
                            @else
                            <a href="/my-transaction" class="dropdown-item has-icon beep">
                                <i class="fas fa-wallet"></i>Transaksi Kamu
                            </a>
                            @endrole
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item has-icon text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                                    class="fas fa-sign-out-alt"></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endauth
                </ul>
            </nav>
            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav">
                        <li class="nav-item{{request()->is('/') ? ' active' : ''}}">
                            <a href="/" class="nav-link"><i class="fas fa-home"></i><span>Homepage</span></a>
                            {{-- <ul class="dropdown-menu">
                                <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                                <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
                            </ul> --}}
                        </li>
                        <li class="nav-item{{request()->is('mobil') ? ' active' : ''}}">
                            <a href="/mobil" class="nav-link"><i class="fas fa-car"></i><span>Mobil Rental</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                                    class="fas fa-vote-yea"></i><span>Jenis Mobil</span></a>
                            <ul class="dropdown-menu">
                                <?php
                                    $data = \App\type::get()
                                ?>
                                @if ($data->count() != 0)
                                @foreach ($data as $singsing)
                                <li class="nav-item"><a href="/jenis-mobil/{{$singsing->id}}"
                                        class="nav-link">{{$singsing->nama_tipe}}</a></li>
                                @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            @yield('content')
        </div>


    </div>

    <footer class="main-footer">
        <div class="bg-light">
            <div class="footer-right">
                Copyright &copy; 2022 <div class="bullet"></div> Website Ngeland Tour Jogja</a>
            </div>
        </div>
    </footer>



    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="{{asset('/assets/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="https://getstisla.com/dist/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>
    <script src="https://getstisla.com/dist/modules/jquery-ui/jquery-ui.min.js"></script>
    <!-- Page Specific JS File -->
    @stack('js')
    <!-- Template JS File -->
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('asset/js/custom.js')}}"></script>
</body>

</html>
