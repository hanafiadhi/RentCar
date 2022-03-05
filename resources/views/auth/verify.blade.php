@extends('frontend.main')

@section('content')
<div class="main-content">
    <section class="section">
         <div class="section-header">
            <h1>Verifikasi Akun Kamu</h1>
        </div>
        <div class="">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow card-danger">
                        <div class="card-header text-danger">{{ __('Verify Your Email Address') }}</div>
        
                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
        
                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <br>
                                {{-- <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>. --}}
                                <button type="submit" class="btn btn-outline-success">{{ __('click here to request another') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
