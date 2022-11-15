@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah - Subsidi')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subsidi/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Subsidi</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('subsidi.store') }}" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nama Subsidi*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Subsidi" name="subsidi_type_name" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nilai Subsidi*</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="Nilai Subsidi" name="subsidi_value" required/>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
