@extends('layouts/contentNavbarLayout')

@section('title', ' Edit - Produk')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Produk/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Produk</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('product.update', $product->product_id) }}" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Kode Produk*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Kode Produk" value="{{ $product->product_code }}" name="product_code" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-name">Nama Produk*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Produk" name="product_name" value="{{ $product->product_name }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-description">Deskripsi Produk</label>
            <textarea id="basic-default-message" class="form-control" placeholder="" name="product_description">{{ $product->product_description }}</textarea>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-type">Tipe Produk*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Tipe Produk" name="product_type" value="{{ $product->product_type }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-type">Warna*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Warna Produk" name="product_colour" value="{{ $product->product_colour }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-type">Tahun*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="" name="product_year" value="{{ $product->product_year }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-price">Harga Produk*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Harga Produk" name="product_price" value="{{ $product->product_price }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-status">Status</label>
            <select id="status" class="select2 form-select" name="status">
              <option value="0" <?php if($product->status == 0){ echo "selected"; } ?>>Tidak Aktif</option>
              <option value="1" <?php if($product->status == 1){ echo "selected"; } ?>>Aktif</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
