@extends('layouts/commonMaster' )

@php
$isMenu = ($isMenu ?? true);
$isFlex = ($isFlex ?? false);
$container = ($container ?? 'container-xxl');

@endphp

@section('layoutContent')
<style type="text/css" media="print">
    @page {margin:0 -6cm}
    html {margin:0 6cm}
</style>
<div class="layout-wrapper layout-content-navbar layout-without-menu">
  <div class="layout-container">


    <!-- Layout page -->
    <div class="layout-page">


      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->
        @if ($isFlex)
        <div class="{{$container}} d-flex align-items-stretch flex-grow-1 p-0">
          @else
          <div class="{{$container}} flex-grow-1 container-p-y">
            @endif

                <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                    <!-- Account -->
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
                                        <div class="row">
                                            <div class="col-md-9">
                                            <h2>invoice<br>
                                            <span class="small">order #{{ $booking->id_booking }}</span></h2>
                                            </div>
                                            <div class="col-md-3">
                                                <img src="{{ asset('assets/img/icon/logo.png') }}" style="width: 150px;">
                                            </div>
                                        </div>
                                        </div>
                                        <hr>
                                        <table class="table">
                                                <tr>
                                                <td>
                                                <address>
                                                <strong>Tagihan Dari :</strong><br>
                                                Bintang Jaya Motor<br>
                                                Jl. Lapabbe No. 8 Sengkang<br>
                                                Teddaopu, Tempe, Sulawesi Selatan<br>
                                                <abbr title="Phone">Telp:</abbr> -
                                                </address></td>
                                                <td class="text-end">
                                                <address>
                                                <strong>Tagihan Untuk:</strong><br>
                                                {{ $booking->fullname }}<br>
                                                {{ $booking->address }}<br>
                                                {{ $booking->ward }}, {{ $booking->districts }}, {{ $booking->city }}<br>
                                                <abbr title="Phone">Telp:</abbr> {{ $booking->no_hp }}
                                                </address></td>
                                                </tr>
                                        </table>
                                        <!-- <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                <strong>Tagihan Dari :</strong><br>
                                                Twitter, Inc.<br>
                                                795 Folsom Ave, Suite 600<br>
                                                San Francisco, CA 94107<br>
                                                <abbr title="Phone">P:</abbr> (123) 456-7890
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-end">
                                                <address>
                                                <strong>Tagihan Untuk:</strong><br>
                                                {{ $booking->fullname }}<br>
                                                P. Sherman 42,<br>
                                                Wallaby Way, Sidney<br>
                                                <abbr title="Phone">P:</abbr> (123) 345-6789
                                                </address>
                                            </div>
                                        </div> -->
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


          </div>
          <!-- / Content -->

          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
  </div>
  <!-- / Layout wrapper -->
  @endsection

  @section('layoutFooter')

  <script type="text/javascript">     
    window.print();
 </script>

  @endsection
