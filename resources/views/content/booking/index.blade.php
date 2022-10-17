@extends('layouts/contentNavbarLayout')

@section('title', 'List - Pemesanan')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pemesanan /</span> List
</h4>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header">Pemesanan</h5>
  <div class="card-body">
    <a href="{{ route('booking.create') }}"><button type="button" class="btn btn-success">Tambah</button></a>
    <br>
    <br>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>ID Pemesanan</th>
            <th>Nama Pemesanan</th>
            <th>Produk</th>
            <th>Harga Produk</th>
            <th>Tipe Pemesanan</th>
            <th>Jumlah Cicilan</th>
            <th>Tipe Subsidi</th>
            <th>Jumlah Subsidi</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @forelse($booking as $key => $row)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key+ $booking->firstItem() }}</strong></td>
            <td>{{ $row->id_booking}}</td>
            <td>{{ $row->fullname }}</td>
            <td>{{ $row->product_name }}</td>
            <td>{{ $row->price_product }}</td>
            <td>{{ $row->type_name }}</td>
            <td>{{ $row->cicilan_value ?? '-' }}</td>
            <td>{{ $row->subsidi_type_name }}</td>
            <td>{{ $row->subsidi_value }}</td>
            <td>
              @if($row->booking_status == 1)
              <span class="badge bg-label-success me-1">Disetujui</span>
              @elseif($row->booking_status == 2)
              <span class="badge bg-label-danger me-1">Tidak Disetujui</span>
              @else
              <span class="badge bg-label-warning me-1">Belum Disetujui</span>
              @endif
            </td>
            <td>
              <a href="{{ route('booking.edit', $row->id_booking) }}" title="Ubah"><button type="button" class="btn btn-sm btn-primary">Ubah</button></a>
              <a href="{{ route('booking.delete', $row->id_booking) }}" data-id="{{ $row->id_booking }}" title="Hapus" class="sa-remove"><button type="button" class="btn btn-sm btn-danger">Hapus</button></a>
              <a href="{{ route('booking.detail', $row->id_booking) }}" title="Approve"><button type="button" class="btn btn-sm btn-success">Detail</button></a>
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
      {{ $booking->links('_partials.pagination') }}
      </div>
      
    </div>
  </div>
</div>
<!--/ Bordered Table -->
@endsection
