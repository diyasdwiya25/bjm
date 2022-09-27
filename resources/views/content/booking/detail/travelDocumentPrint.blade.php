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
                                        <!-- <div class="row">
                                            <div class="col-xs-12">
                                            <h2>invoice<br>
                                            <span class="small">order #{{ $booking->id_booking }}</span></h2>
                                            </div>
                                        </div> -->
                                        </div>
                                        <table class="table">
                                                <tr>
                                                <td></td>
                                                <td class="text-end">
                                                <strong>Tanggal,</strong>
                                                ......................... <br>
                                                <strong>Kepada Tuan</strong>
                                                ......................... <br>
                                                </td>
                                                </tr>

                                        </table>
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="divider">
                                            <strong><h3>Surat Jalan</h3></strong>
                                            <hr></hr>
                                        </div>
                                        <div class="divider text-start">
                                            <h4>Bersama ini Kendaraan .................... No. Pol. ....................... kami <br>kirimkan .........
                                                unit sepeda motor beserta perlengkapannya
                                            </h4>
                                            <h4>Sepeda Motor dalam keadaan 100% baru/baik dan lengkap</h4>
                                            <h4>Pada Tanggal : ................................ Kode Buku : ....................................</h4>
                                            <hr></hr>
                                        </div>

                                        <table class="table">
                                            <tr>
                                                <td><h4>Dengan data-data sebagai berikut : </h4></td>
                                                <td><h4>Perlengkapan </h4></td>
                                                <td><h4>Ada </h4></td>
                                                <td><h4>Tidak Ada </h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Merk/Type/Th. : ................. </h4></td>
                                                <td><h4>Buku Service </h4></td>
                                                <td><h4>.......</h4></td>
                                                <td><h4>.......</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>No. Rangka : ................. </h4></td>
                                                <td><h4>Buku Petunjuk </h4></td>
                                                <td><h4>.......</h4></td>
                                                <td><h4>.......</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>No. Mesin : ................. </h4></td>
                                                <td><h4>Buku Pedoman </h4></td>
                                                <td><h4>.......</h4></td>
                                                <td><h4>.......</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>Warna : ................. </h4></td>
                                                <td><h4>Tool Kit </h4></td>
                                                <td><h4>.......</h4></td>
                                                <td><h4>.......</h4></td>
                                            </tr>
                                            <tr>
                                                <td><h4>No. Polisi : ................. </h4></td>
                                                <td><h4>Helm </h4></td>
                                                <td><h4>.......</h4></td>
                                                <td><h4>.......</h4></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><h4>Jaket </h4></td>
                                                <td><h4>.......</h4></td>
                                                <td><h4>.......</h4></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><h4>Hadiah </h4></td>
                                                <td><h4>.......</h4></td>
                                                <td><h4>.......</h4></td>
                                            </tr>

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
