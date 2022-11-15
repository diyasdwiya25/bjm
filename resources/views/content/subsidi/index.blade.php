@extends('layouts/contentNavbarLayout')

@section('title', 'List - Subsidi')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Subsidi /</span> List
</h4>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Subsidi</h5>
  <div class="card-body">
    <a href="{{ route('subsidi.create') }}"><button type="button" class="btn btn-success">Tambah</button></a>
    <br>
    <br>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Subsidi</th>
            <th>Nilai Subsidi</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @forelse($subsidi as $key => $row)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key+ $subsidi->firstItem() }}</strong></td>
            <td>{{ $row->subsidi_type_name }}</td>
            <td>{{ $row->subsidi_value }}</td>
            <td>
              @if($row->status == 1)
              <span class="badge bg-label-success me-1">Aktif</span>
              @else
              <span class="badge bg-label-danger me-1">Tidak Aktif</span>
              @endif
            </td>
            <td>
              <a href="{{ route('subsidi.edit', $row->id) }}" title="Ubah"><button type="button" class="btn btn-sm btn-primary">Ubah</button></a>
              <a href="{{ route('subsidi.delete', $row->id) }}" data-id="{{ $row->id }}" title="Hapus" class="sa-remove"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
            </td>
          </tr>
          @empty
            <tr>
              <td colspan="4" align="center">
                <p>Tidak ada data</p>
              </td>
            </tr>
        @endforelse
        </tbody>
      </table>
      <br>
      <div class="col-md-12">
      {{ $subsidi->links('_partials.pagination') }}
      </div>
      
    </div>
  </div>
</div>
<!--/ Bordered Table -->
@endsection
