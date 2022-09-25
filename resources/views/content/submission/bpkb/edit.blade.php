@extends('layouts/contentNavbarLayout')

@section('title', ' Edit - Pengajuan Bpkb')

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pengajuan Bpkb/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
    <div class="card mb-4">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Edit Pengajuan Bpkb</h5>
      </div>
      <div class="card-body">
        <form action="{{ route('submission.bpkb.update', $bpkb->id) }}" method="POST">
        @csrf
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Produk Pemesanan*</label>
            <select id="status" class="select2 form-select" name="id_product" required>
              @foreach($booking as $row)
              <option value="{{ $row->id_booking }}" <?php if($bpkb->id_booking == $row->id_booking){ echo "selected"; } ?>>{{ $row->product_name }} - {{ $row->product_type}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Nomor Plat*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Nomor Plat" value="{{ $bpkb->no_plat }}" name="no_plat" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Atas Nama*</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="Atas Nama" value="{{ $bpkb->name }}" name="name" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Tanggal Diajukan*</label>
            <input type="date" class="form-control" id="basic-default-name" placeholder="d/m/Y" value="{{ $bpkb->filed_date }}" name="filed_date" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Tanggal Selesai*</label>
            <input type="date" class="form-control" id="basic-default-name" placeholder="d/m/Y" value="{{ $bpkb->finish_date }}" name="finish_date" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Tanggal Diserahkan Leasing</label>
            <input type="date" class="form-control" id="basic-default-name" placeholder="d/m/Y" value="{{ $bpkb->handed_over_leasing_date }}" name="handed_over_leasing_date"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Tanggal Diserahkan Klien</label>
            <input type="date" class="form-control" id="basic-default-name" placeholder="d/m/Y" value="{{ $bpkb->handed_over_date }}" name="handed_over_date"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Diserahkan Oleh</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="" value="{{ $bpkb->handed_over_by }}" name="handed_over_by"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-fullname">Diterima Oleh</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="" value="{{ $bpkb->received_by }}" name="received_by"/>
          </div>
          <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection
