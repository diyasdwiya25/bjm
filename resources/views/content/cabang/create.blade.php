@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah - Cabang')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Cabang/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Cabang</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('cabang.store') }}" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nama*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Makasar" name="branch_name" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-company">Alamat</label>
            <textarea id="basic-default-message" class="form-control" placeholder="" name="branch_address"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
