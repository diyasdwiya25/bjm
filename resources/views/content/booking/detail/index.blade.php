@extends('layouts/contentNavbarLayout')

@section('title', 'Detail - Pemesanan')

@section('page-script')
<script src="{{asset('assets/js/pages-account-settings-account.js')}}"></script>
<style>
  a.disabled {
    pointer-events: none;
    cursor: default;
  }
</style>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Pemesanan /</span> Detail
</h4>

<div class="row">
  <div class="col-md-12">
    <ul class="nav nav-pills flex-column flex-md-row mb-3">
      <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Detail</a></li>
      @if(Auth::user()->user_level == 1 or Auth::user()->user_level == 2)
      <li class="nav-item"><a class="nav-link" href="{{route('booking.document', $booking->id_booking)}}"><i class="bx bx-bell me-1"></i> Surat Jalan</a></li>
      @endif
    </ul>
    <div class="card mb-4">
      <!-- Account -->
      <div class="card-body">
        <div class="d-flex align-items-start align-items-sm-center gap-4">
        @if(Auth::user()->user_level == 1)
        <div class="col-md-6">
          <a href="{{ route('booking.approve', $booking->id_booking) }}" data-id="{{ $booking->id_booking }}" title="Approve" class="sa-approve">
            <button type="button" class="btn btn-outline-secondary mb-4">
              <!-- <i class="bx bx-reset d-block d-sm-none"></i> -->
              <span class="d-sm-block">Setujui</span>
            </button>
          </a>
          <a href="{{ route('booking.approve.payment', $booking->id_booking) }}" data-id="{{ $booking->id_booking }}" title="Approve" class="sa-payment <?php if($booking->booking_status != 1) { echo "disabled"; } ?>">
            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" <?php if($booking->booking_status != 1) { echo "disabled"; } ?>>
              <!-- <i class="bx bx-reset d-block d-sm-none"></i> -->
              <span class="d-sm-block">Terima Pembayaran</span>
            </button>
          </a>
        </div>
        @elseif(Auth::user()->user_level == 2)
          <div class="col-md-6">
            <a href="{{ route('booking.approve.payment', $booking->id_booking) }}" data-id="{{ $booking->id_booking }}" title="Approve" class="sa-payment <?php if($booking->booking_status != 1) { echo "disabled"; } ?>">
              <button type="button" class="btn btn-outline-secondary account-image-reset mb-4" <?php if($booking->booking_status != 1) { echo "disabled"; } ?>>
                <!-- <i class="bx bx-reset d-block d-sm-none"></i> -->
                <span class="d-sm-block">Terima Pembayaran</span>
              </button>
            </a>
          </div>
        @endif
          
       
        </div>
      </div>
      
      <div class="card-body" id="pageToPrint">
      <div class="container">
        <div class="row">
                    <!-- BEGIN INVOICE -->
                  <div class="col-xs-12">
                    <div class="grid invoice">
                      <div class="grid-body">
                        <div class="invoice-title">
                          <div class="row">
                            <div class="col-xs-12">
                              <!-- <img src="http://vergo-kertas.herokuapp.com/assets/img/logo.png" alt="" height="35"> -->
                            </div>
                          </div>
                          <br>
                          @if(Auth::user()->user_level == 1 or Auth::user()->user_level == 2)
                          <div class="row">
                            <div class="col-md-12 text-end">
                              <a href="{{ route('booking.detail.print', $booking->id_booking) }}" target="_blank" class="<?php if($booking->booking_status != 1) { echo "disabled"; } ?>">
                                <button type="button" class="btn btn-success account-image-reset mb-4" <?php if($booking->booking_status != 1) { echo "disabled"; } ?>>
                                  <!-- <i class="bx bx-reset d-block d-sm-none"></i> -->
                                  <span class="d-sm-block">Cetak Invoice</span>
                                </button>
                                </a>
                              <a href="{{ route('booking.spkPrint', $booking->id_booking) }}" class="<?php if($booking->booking_status != 1) { echo "disabled"; } ?>" target="_blank">
                                <button type="button" class="btn btn-success account-image-reset mb-4" <?php if($booking->booking_status != 1) { echo "disabled"; } ?>>
                                  <!-- <i class="bx bx-reset d-block d-sm-none"></i> -->
                                  <span class="d-sm-block">Cetak SPK</span>
                                </button>
                              </a>
                            </div>
                          </div>
                          @endif
                          <div class="row">
                            <div class="col-xs-12">
                              <h2>invoice<br>
                              <span class="small">order #{{ $booking->id_booking }}</span></h2>
                            </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-md-6">
                            <address>
                              <strong>Tagihan Dari :</strong><br>
                              Bintang Jaya Motor<br>
                              Jl. Lapabbe No. 8 Sengkang<br>
                              Teddaopu, Tempe, Sulawesi Selatan<br>
                              <abbr title="Phone">Telp:</abbr> -
                            </address>
                          </div>
                          <div class="col-md-6 text-end">
                            <address>
                              <strong>Tagihan Untuk:</strong><br>
                              {{ $booking->fullname }}<br>
                              {{ $booking->address }}<br>
                              {{ $booking->ward }}, {{ $booking->districts }}, {{ $booking->city }}<br>
                              <abbr title="Phone">Telp:</abbr> {{ $booking->no_hp }}
                            </address>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12 text-end">
                            <address>
                              <strong>Tanggal Pemesanan:</strong><br>
                              {{ $booking->created_at }}
                            </address>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                            <h3>Detail Pesanan</h3>
                            <table class="table table-striped">
                              <thead>
                                <tr class="line">
                                  <td><strong>#</strong></td>
                                  <td class="text-center"><strong>PRODUK</strong></td>
                                  <td class="text-center"><strong>TIPE PEMESANAN</strong></td>
                                  <td class="text-center"><strong>KUANTITAS</strong></td>
                                  <td class="text-right"><strong>HARGA</strong></td>
                                  <td class="text-right"><strong>SUBTOTAL</strong></td>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td class="text-center">{{ $booking->product_name }}</td>
                                  <td class="text-center">
                                  <?php if($booking->booking_type == 1){ ?>
                                    {{ $booking->type_name }}
                                  <?php } else {?>
                                    {{ $booking->type_name }} - {{ $booking->cicilan_value }}x
                                  <?php } ?>
                                  </td>
                                  <td class="text-center">1</td>
                                  <td>{{ $booking->price_product }}</td>
                                  <td>{{ $booking->price_product }}</td>
                                </tr>
                                <tr>
                                  <td colspan="4"></td>
                                  <td><strong>Subsidi</strong></td>
                                  <td><strong>-{{ $booking->subsidi_value }}</strong></td>
                                </tr>
                                <tr>
                                  <td colspan="4"></td>
                                  <td><strong>Total</strong></td>
                                  <td><strong>{{ $booking->price_product - $booking->subsidi_value}}</strong></td>
                                </tr>
                                <tr>
                                  <td colspan="4"></td>
                                  <td><strong>Total Dibayar</strong></td>
                                  <td><strong>{{ $booking->booking_total}}</strong></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>									
                        </div>
                        <!-- <div class="row">
                          <div class="col-md-12 text-right identity">
                            <p>Designer identity<br><strong>Jeffrey Williams</strong></p>
                          </div>
                        </div> -->
                      </div>
                    </div>
                  </div>
                  <!-- END INVOICE -->
                </div>
        </div>
      </div>
      <!-- /Account -->
    </div>
  </div>
</div>
@endsection
@section('footer')
<script type="text/javascript">     
    function PrintPage() {    
      window.print();
      // var pageToPrint = document.getElementById('pageToPrint');
      // var popupWin = window.open('', '_blank', 'width=1024,height=1024');
      // popupWin.document.open();
      // popupWin.document.write('<html><body onload="window.print()">' + pageToPrint.innerHTML + '</html>');
      // popupWin.document.close();
    }
 </script>
 @endsection