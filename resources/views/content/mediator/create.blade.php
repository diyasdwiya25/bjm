@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah - Mediator')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Mediator/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Mediator</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('mediator.store') }}" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nama Mediator*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Mediator" name="mediator_name" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">No Hp*</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="0123456789" name="no_hp" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nomor Identitas*</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="0123456789" name="id_number" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Jumlah Biaya*</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="0123456789" name="amount_fee" required/>
          </div>
          
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
