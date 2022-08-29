@extends('layouts/contentNavbarLayout')

@section('title', ' Edit - Subsidi')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Subsidi/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Subsidi</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('subsidi.update', $subsidi->id) }}" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nama Subsidi*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Subsidi" name="subsidi_type_name" value="{{ $subsidi->subsidi_type_name }}" required/>
          </div>
          <div class="mb-3">
          <label class="form-label" for="basic-default-status">Status</label>
          <select id="status" class="select2 form-select" name="status">
            <option value="0" <?php if($subsidi->status == 0){ echo "selected"; } ?>>Tidak Aktif</option>
            <option value="1" <?php if($subsidi->status == 1){ echo "selected"; } ?>>Aktif</option>
          </select>
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
