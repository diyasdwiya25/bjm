@extends('layouts/contentNavbarLayout')

@section('title', 'List - Mediator')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Mediator /</span> List
</h4>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Mediator</h5>
  <div class="card-body">
    <a href="{{ route('mediator.create') }}"><button type="button" class="btn btn-success">Tambah</button></a>
    <br>
    <br>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Mediator</th>
            <th>No Hp</th>
            <th>Jumlah Biaya</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @forelse($mediator as $key => $row)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key+ $mediator->firstItem() }}</strong></td>
            <td>{{ $row->mediator_name }}</td>
            <td>{{ $row->no_hp }}</td>
            <td>{{ $row->amount_fee }}</td>
            <td>
              <a href="{{ route('mediator.edit', $row->id) }}" title="Ubah"><button type="button" class="btn btn-sm btn-primary">Ubah</button></a>
              <a href="{{ route('mediator.delete', $row->id) }}" data-id="{{ $row->id }}" title="Hapus" class="sa-remove"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
            </td>
          </tr>
          @empty
            <tr>
              <td colspan="5" align="center">
                <p>Tidak ada data</p>
              </td>
            </tr>
        @endforelse
        </tbody>
      </table>
      <br>
      <div class="col-md-12">
      {{ $mediator->links('_partials.pagination') }}
      </div>
      
    </div>
  </div>
</div>
<!--/ Bordered Table -->
@endsection
