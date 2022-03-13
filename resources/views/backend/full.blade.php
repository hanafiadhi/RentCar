<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ \App\website::get('app_name')->first()->app_name ?? 'Rental Mobil'}} | {{$title ?? ''}}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon"
        href="{{ \App\website::get('favicon')->first() ? asset('/webset/'.\App\website::get('favicon')->first()->favicon) : ''}}">
    <!-- CSS Libraries -->
    @yield('css-image')
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="https://demo.getstisla.com/assets/modules/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <!-- navbar -->
                <ul class="navbar-nav navbar-right ml-auto">
                    <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block"> {{ Auth::user()->name ?? 'Admin'  }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            {{-- <div class="dropdown-title">Logged in 5 min ago</div> --}}
                            <a href="/profil-admin" class="dropdown-item has-icon">
                                <i class="far fa-user"></i>My Profile
                            </a>
                            <a href="/profil-admin" class="dropdown-item has-icon">
                                <i class="fab fa-google"></i>Kaitkan ke Google
                            </a>
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
                </ul>
                <!-- navbar -->
            </nav>
            <!---side bar--->
            @include('backend.sidebar')
            <!-- Main Content -->
            @yield('konten')
            <!-- Main Content -->
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://nauval.in/">Muhamad
                        Nauval Azhar</a>
                </div>
                <div class="footer-right">
                    2.3.0
                </div>
            </footer>
        </div>
    </div>

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

    <!-- Template JS File -->
    <script src="https://demo.getstisla.com/assets/modules/summernote/summernote-bs4.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/select2/dist/js/select2.full.min.js"></script>
    <script src="https://demo.getstisla.com/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>
    <script src="{{asset('asset/js/custom.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                placeholder: "  Silahkan Pilih"
            });
        });

    </script>
    <!-- Page Specific JS File -->
    @stack('javascript')
</body>

</html>
