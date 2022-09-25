@extends('layouts/contentNavbarLayout')

@section('title', 'List - Pengajuan Stnk')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pengajuan Stnk /</span> List
</h4>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Pengajuan Stnk</h5>
  <div class="card-body">
    <a href="{{ route('submission.stnk.create') }}"><button type="button" class="btn btn-success">Tambah</button></a>
    <br>
    <br>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Produk</th>
            <th>Merk Produk</th>
            <th>Nomor Plat</th>
            <th>Atas Nama</th>
            <th>Tanggal Diajukan</th>
            <th>Tanggal Selesai</th>
            <th>Tanggal Diserahkan</th>
            <th>Diserahkan Oleh</th>
            <th>Diterima Oleh</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @forelse($stnk as $key => $row)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $no++ }}</strong></td>
            <td>{{ $row->product_name }}</td>
            <td>{{ $row->product_type }}</td>
            <td>{{ $row->no_plat }}</td>
            <td>{{ $row->name }}</td>
            <td>{{ $row->filed_date }}</td>
            <td>{{ $row->finish_date }}</td>
            <td>{{ $row->handed_over_date }}</td>
            <td>{{ $row->handed_over_by }}</td>
            <td>{{ $row->received_by }}</td>
            <td>
              <a href="{{ route('submission.stnk.edit', $row->id) }}" title="Ubah"><button type="button" class="btn btn-sm btn-primary">Ubah</button></a>
              <a href="{{ route('submission.stnk.delete', $row->id) }}" data-id="{{ $row->id }}" title="Hapus" class="sa-remove"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
            </td>
          </tr>
          @empty
            <tr>
              <td colspan="11" align="center">
                <p>Tidak ada data</p>
              </td>
            </tr>
        @endforelse
        </tbody>
      </table>
      <br>
      <div class="col-md-12">
      {{ $stnk->links('_partials.pagination') }}
      </div>
      
    </div>
  </div>
</div>
<!--/ Bordered Table -->
@endsection
