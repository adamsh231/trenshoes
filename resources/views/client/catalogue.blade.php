@extends('client.layout.main')

@section('title', 'Katalog')
@section('catalogue', 'active')

@section('add_style')
{{-- ------------------------Vue Core-------------------------- --}}
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- ---------------------------------------------------------- --}}
@endsection

@section('content')
<!-- Start Banner Area -->
<section class="banner-area organic-breadcrumb">
</section>
<!-- End Banner Area -->

<div id="app">
    <catalogue-component></catalogue-component>
</div>

@endsection
