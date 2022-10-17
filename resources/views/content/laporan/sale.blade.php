@extends('layouts/contentNavbarLayout')

@section('title', 'Laporan - Penjualan')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Laporan Penjualan</span>
</h4>

<!-- Bordered Table -->
<div class="card">
  <h5 class="card-header"></h5>
  <div class="card-body">
  <a href="{{ route('laporan.export') }}"><button type="button" class="btn btn-success">Excel</button></a>
  <br>
  <br>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>#</th>
            <th>Tanggal</th>
            <th>No Order</th>
            <th>Pembeli</th>
            <th>Produk</th>
            <th>Sub Total</th>
            <th>Diskon/Subsidi</th>
            <th>Total Penjualan</th>
            <th>Pembayaran</th>
            <th>Saldo</th>
          </tr>
        </thead>
        <tbody>
        <?php $no = 1; ?>
        @forelse($booking as $key => $row)
          <tr>
            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $key+ $booking->firstItem() }}</strong></td>
            <td>{{ date('d-m-Y', strtotime($row->created_at)); }}</td>
            <td>{{ $row->id_booking }}</td>
            <td>{{ $row->fullname }}</td>
            <td>{{ $row->product_name }}</td>
            <td>@currency($row->price_product)</td>
            <td>@currency($row->subsidi_value)</td>
            <td>@currency($row->price_product - $row->subsidi_value)</td>
            <td>
                <?php if($row->payment_status == 1) { ?>
                    @currency($row->booking_total)
                <?php } ?>
            </td>
            <td>
                <?php if($row->payment_status == 0) { ?>
                    @currency($row->booking_total)
                <?php } ?>
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
