@extends('layouts/contentNavbarLayout')

@section('title', ' Tambah - Role')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Role/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Tambah Role</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('role.store') }}" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nama Role*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Role" name="role_name" required/>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
