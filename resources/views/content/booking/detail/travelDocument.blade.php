@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pemesanan /</span> Surat Jalan
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link" href="{{route('booking.detail', $booking->id_booking)}}"><i class="bx bx-user me-1"></i> Detail</a></li>
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-bell me-1"></i> Surat Jalan</a></li>
    </ul>
    <div class="card mb-4">
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
          <div class="button-wrapper">
          <a href="{{ route('booking.document.print', $booking->id_booking) }}" target="_blank">
            <button type="button" class="btn btn-success account-image-reset mb-4">
              <i class="bx bx-reset d-block d-sm-none"></i>
              <span class="d-none d-sm-block">Print</span>
            </button>
            </a>
          </div>
       
        </div>
      </div>
      <hr class="my-0">
      <form action="{{ route('booking.document.store', $booking->id_booking) }}" method="POST">
      @csrf
      <div class="card-body">
          <div class="row">
            <div class="col-sm-6">
                <label class="form-label" for="basic-default-product-code">Nomor Rangka</label>
                <input type="text" class="form-control" id="basic-default-name" name="chassis_number" value="{{ $booking_document->chassis_number ?? '' }}"/>
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="basic-default-product-code">Nomor Mesin</label>
                <input type="text" class="form-control" id="basic-default-name" name="machine_number" value="{{ $booking_document->machine_number ?? '' }}"/>
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="basic-default-product-code">Warna</label>
                <input type="text" class="form-control" id="basic-default-name" name="colour" value="{{ $booking_document->colour ?? '' }}"/>
            </div>
            <div class="col-sm-6">
                <label class="form-label" for="basic-default-product-code">No Polisi</label>
                <input type="text" class="form-control" id="basic-default-name" name="no_plat" value="{{ $booking_document->no_plat ?? '' }}"/>
            </div>
          </div>
      </div>
      <div class="card">
      <!-- Notifications -->
      <div class="table-responsive">
        <table class="table table-striped table-borderless border-bottom">
          <thead>
            <tr>
              <th class="text-nowrap">Perlengkapan</th>
              <th class="text-nowrap text-center">Ada</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td class="text-nowrap">Buku Servie</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" name="service_book" value="1" <?php if($booking_document->service_book ?? 0 == 1) { echo "checked"; } ?> id="defaultCheck1"/>
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap">Buku Petunjuk</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" name="guide_book" value="1" <?php if($booking_document->guide_book ?? 0 == 1) { echo "checked"; } ?> id="defaultCheck2"/>
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap">Buku Pedoman</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" name="guidelines_book" value="1" <?php if($booking_document->guidelines_book ?? 0 == 1) { echo "checked"; } ?> id="defaultCheck3"/>
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap">Tool Kit</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" name="tool_kit" value="1" <?php if($booking_document->tool_kit ?? 0 == 1) { echo "checked"; } ?> id="defaultCheck4"/>
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap">Helm</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" name="helmet" value="1" <?php if($booking_document->helmet ?? 0 == 1) { echo "checked"; } ?> id="defaultCheck5" />
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap">Jaket</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" name="jacket" value="1" <?php if($booking_document->jacket ?? 0 == 1) { echo "checked"; } ?> id="defaultCheck6"/>
                </div>
              </td>
            </tr>
            <tr>
              <td class="text-nowrap">Hadiah</td>
              <td>
                <div class="form-check d-flex justify-content-center">
                  <input class="form-check-input" type="checkbox" name="gift" value="1" <?php if($booking_document->gift ?? 0 == 1) { echo "checked"; } ?> id="defaultCheck7" />
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
        <div class="card-body">
            <div class="mt-4">
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
            </div>
        </div>
      </form>
      <!-- /Notifications -->
    </div>
  </div>
</div>
@endsection
@section('footer')
<script type="text/javascript">     
    function PrintPage() {    
      window.print();
    }
 </script>
 @endsection