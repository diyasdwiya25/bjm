@extends('layouts/contentNavbarLayout')

@section('title', 'List - Produk')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Produk /</span> List
</h4>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Produk</h5>
  <div class="card-body">
    <a href="{{ route('product.create') }}"><button type="button" class="btn btn-success">Tambah</button></a>
    <br>
    <br>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Kode</th>
            <th>Nama Produk</th>
            <th>Deskripsi Produk</th>
            <th>Tipe Produk</th>
            <th>Harga Produk</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @forelse($product as $key => $row)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $no++ }}</strong></td>
            <td>{{ $row->product_code }}</td>
            <td>{{ $row->product_name }}</td>
            <td>{{ $row->product_description }}</td>
            <td>{{ $row->product_type }}</td>
            <td>{{ $row->product_price }}</td>
            <td>
              @if($row->status == 1)
              <span class="badge bg-label-success me-1">Aktif</span>
              @else
              <span class="badge bg-label-danger me-1">Tidak Aktif</span>
              @endif
            </td>
            <td>
              <a href="{{ route('product.edit', $row->product_id) }}" title="Ubah"><button type="button" class="btn btn-sm btn-primary">Ubah</button></a>
              <a href="{{ route('product.delete', $row->product_id) }}" data-id="{{ $row->product_id }}" title="Hapus" class="sa-remove"><button type="button" class="btn btn-sm btn-danger">Delete</button></a>
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
      {{ $product->links('_partials.pagination') }}
      </div>
      
    </div>
  </div>
</div>
<!--/ Bordered Table -->
@endsection
