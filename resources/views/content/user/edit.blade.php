@extends('layouts/contentNavbarLayout')

@section('title', ' Edit - Pengguna')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengguna/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Pengguna</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('user.update', $user->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="basic-default-firstname">Nama Depan*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="John" name="first_name" value="{{ $user->first_name }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-lastname">Nama Belakang*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Doe" name="last_name" value="{{ $user->last_name }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-role">Akses</label>
            <select id="status" class="select2 form-select" name="user_level" required>
              @foreach($role as $row)
              <option value="{{ $row->id }}" <?php if($row->id == $user->user_level){ echo "selected"; } ?>>{{ $row->role_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-branch">Cabang</label>
            <select id="status" class="select2 form-select" name="user_branch" required>
              @foreach($cabang as $row)
              <option value="{{ $row->id }}" <?php if($row->id == $user->user_branch){ echo "selected"; } ?>>{{ $row->branch_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Email*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="johndoe@gmail.com" name="email" value="{{ $user->email }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-email">Password*</label>
            <input type="password" class="form-control" id="basic-default-name" placeholder="" name="password" value="{{ $user->password }}"/>
          </div>
          <div class="mb-3">
          <label class="form-label" for="basic-default-status">Status</label>
          <select id="status" class="select2 form-select" name="status">
            <option value="0" <?php if($user->status == 0){ echo "selected"; } ?>>Tidak Aktif</option>
            <option value="1" <?php if($user->status == 1){ echo "selected"; } ?>>Aktif</option>
          </select>
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
