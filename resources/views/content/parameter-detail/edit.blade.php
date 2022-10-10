@extends('layouts/contentNavbarLayout')

@section('title', ' Edit - Parameter Detail')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Parameter/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Parameter Detail</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('parameter.detail.update', $parameterDetail->id) }}" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-branch">Parameter*</label>
            <select id="status" class="select2 form-select" name="param_id" required>
              @foreach($parameter as $row)
              <option value="{{ $row->id }}" <?php if($row->id == $parameterDetail->param_id) { echo "selected"; } ?>>{{ $row->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nama*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="" name="name" value="{{ $parameterDetail->name }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-address">Deskripsi</label>
            <textarea id="basic-default-message" class="form-control" placeholder="" name="description">{{ $parameterDetail->description }}</textarea>
          </div>
          <div class="mb-3">
          <label class="form-label" for="basic-default-status">Status</label>
          <select id="status" class="select2 form-select" name="status">
            <option value="0" <?php if($parameterDetail->status == 0){ echo "selected"; } ?>>Tidak Aktif</option>
            <option value="1" <?php if($parameterDetail->status == 1){ echo "selected"; } ?>>Aktif</option>
          </select>
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
