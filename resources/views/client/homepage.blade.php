@extends('client.layout.main')

@section('title', 'Home')
@section('home', 'active')

@section('add_style')
{{-- ------------------------Vue Core-------------------------- --}}
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- ---------------------------------------------------------- --}}
@endsection

@section('content')
<!-- start banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <!-- single-slide -->
                <div class="row single-slide align-items-center d-flex">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">
                            <h1>Toko Sepatu<br>Terpercaya!</h1>
                            <p>Marketplace sepatu online, murah dan terpecaya</p>
                            <div class="add-bag d-flex align-items-center">
                                <a href="{{ url('/catalogue') }}" class="genric-btn primary circle arrow">Katalog<span class="lnr lnr-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner-img">
                            <img class="img-fluid" src="{{ asset('karma/img/banner/banner-img.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->

<div id="app">
    <homepage-component></homepage-component>
</div>
@endsection
