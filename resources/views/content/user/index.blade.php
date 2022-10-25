@extends('layouts/contentNavbarLayout')

@section('title', 'List - Pengguna')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pengguna /</span> List
</h4>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Pengguna</h5>
  <div class="card-body">
    <a href="{{ route('user.create') }}"><button type="button" class="btn btn-success">Tambah</button></a>
    <br>
    <br>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Depan</th>
            <th>Nama Belakang</th>
            <th>Email</th>
            <th>Akses</th>
            <th>Cabang</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @forelse($user as $key => $row)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key+ $user->firstItem() }}</strong></td>
            <td>{{ $row->first_name }}</td>
            <td>{{ $row->last_name }}</td>
            <td>{{ $row->email }}</td>
            <td>{{ $row->role_name }}</td>
            <td>{{ $row->branch_name }}</td>
            <td>
              @if($row->status == 1)
              <span class="badge bg-label-success me-1">Aktif</span>
              @else
              <span class="badge bg-label-danger me-1">Tidak Aktif</span>
              @endif
            </td>
            <td>
              <a href="{{ route('user.edit', $row->id) }}" title="Ubah"><button type="button" class="btn btn-sm btn-primary">Ubah</button></a>
              <a href="{{ route('user.delete', $row->id) }}" data-id="{{ $row->id }}" title="Hapus" class="sa-remove"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
            </td>
          </tr>
          @empty
            <tr>
              <td colspan="8" align="center">
                <p>Tidak ada data</p>
              </td>
            </tr>
        @endforelse
        </tbody>
      </table>
      <br>
      <div class="col-md-12">
      {{ $user->links('_partials.pagination') }}
      </div>
      
    </div>
  </div>
</div>
<!--/ Bordered Table -->
@endsection
