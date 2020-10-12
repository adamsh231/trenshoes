@extends('admin.layout.main')

@section('add_style')
{{-- ------------------------Vue Core-------------------------- --}}
<script src="{{ asset('js/app.js') }}" defer></script>
{{-- ---------------------------------------------------------- --}}
@endsection

@section('content')
<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    </nav>
    <!-- End of Topbar -->

    <div id="app">
        <dashboard-component></dashboard-component>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal_add_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input type="text" id="input_name" class="form-control" placeholder="Nama Produk" aria-label="Username" aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="input_brand">Merek</label>
                        </div>
                        <select class="custom-select" id="input_brand">
                            @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" for="input_price">Harga</span>
                        </div>
                        <input type="number" id="input_price" min='0' class="form-control" placeholder="Harga Produk" aria-label="Username" aria-describedby="input_price">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="button_add_product" class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- End of Main Content -->
@endsection
