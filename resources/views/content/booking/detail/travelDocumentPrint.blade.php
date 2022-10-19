<html>
  <head>
    <title>Surat Jalan Kendaraan</title>
    <style type="text/css" media="print">
      @page {
        margin: 0 -6cm
      }

      html {
        margin: 0 6cm
      }
      
    </style>
    
  </head>
  <body>
  <?php $dateNow = Carbon\Carbon::now(); ?>
    <table align="center" border="0" cellpadding="1" style="width: 700px;">
      <tbody>
      <tr>
          <td colspan="2">
            <div>
              <span style="font-size: x-small;">BJM</span>
            </div>
          </td>
          <td >
            <table border="0" cellpadding="1" style="width: 250px;" align="right">
              <tbody>
                <tr>
                  <td width="93">
                    <span style="font-size: small;">Tanggal</span>
                  </td>
                  <td width="8">
                    <span style="font-size: small;">:</span>
                  </td>
                  <td width="200">
                    <span style="font-size: small;">{{ date("d-m-Y") }}</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span style="font-size: small;">Kepada Tuan</span>
                  </td>
                  <td>
                    <span style="font-size: small;">:</span>
                  </td>
                  <td>
                    <span style="font-size: small;">{{ $booking->fullname }}</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span style="font-size: small;">Toko</span>
                  </td>
                  <td>
                    <span style="font-size: small;">:</span>
                  </td>
                  <td>
                    <span style="font-size: small;">Bintang Jaya Motor</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" style="padding-top: 20px;padding-bottom: 20px;">
            <div align="center">
              <span style="font-family: Verdana; font-size: large;">
                <b>SURAT JALAN</b>
              </span>
              <hr style="width:50%">
              <span style="font-family: Verdana; font-size: small;">
                No: <u>{{ $booking->number }}</u>
              </span>
            </div>
          </td>
        </tr>
        <!-- <tr>
          <td colspan="2">
            <table border="0" cellpadding="1" style="width: 400px;">
              <tbody>
                <tr style="padding-top: 20px;">
                  <td width="93">
                    <span style="font-size: x-small;">No</span>
                  </td>
                  <td width="8">
                    <span style="font-size: x-small;">:</span>
                  </td>
                  <td width="200">
                    <span style="font-size: x-small;">005/ smk-if/ yps/ IV/ 2011</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span style="font-size: x-small;">Lampiran</span>
                  </td>
                  <td>
                    <span style="font-size: x-small;">:</span>
                  </td>
                  <td>
                    <span style="font-size: x-small;">-</span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span style="font-size: x-small;">Perihal</span>
                  </td>
                  <td>
                    <span style="font-size: x-small;">:</span>
                  </td>
                  <td>
                    <span style="font-size: x-small;">Rapat orangtua siswa</span>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
          <td valign="top">
            <div align="right">
              <span style="font-size: x-small;">Sumedang, 03 mei 2011</span>
            </div>
          </td>
        </tr> -->
        <!-- <tr>
          <td width="302"></td>
          <td width="343"></td>
          <td width="339"></td>
        </tr>
        <tr>
          <td>
            <table border="0" style="width: 239px;">
              <tbody>
                <tr>
                  <td width="74">
                    <span style="font-size: x-small;">kepada yth</span>
                  </td>
                  <td width="11"></td>
                  <td width="140"></td>
                </tr>
                <tr>
                  <td>
                    <span style="font-size: x-small;">orangtua/wali siswa</span>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <span style="font-size: x-small;">di</span>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>
                    <span style="font-size: x-small;">tempat</span>
                  </td>
                  <td></td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td></td>
          <td></td>
        </tr> -->
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td colspan="3" valign="top">
            <div align="left">
            <span>
            Bersama ini Kendaraan <u>{{ $booking->product_name }}</u> No. Pol. <u>{{ $booking->no_plat }}</u> kami kirimkan <u> 1 </u>unit sepeda motor beserta perlengkapannya.
            </span>
            
          </td>
        </tr>
        <tr>
          <td colspan="3" valign="top">
            <div align="left">
            <span>
            Sepeda Motor dalam keadaan 100% baru/baik dan lengkap.
            </span>
            
          </td>
        </tr>
        <tr>
          <td colspan="3" height="40" valign="top">
            <div align="left">
            <span style="padding-right:50px;">
            Pada Tanggal : {{ date("d-m-Y") }} 
            </span>
            <span>
            Kode Buku : {{ $booking->book_code }}
            </span>
            
          </td>
        </tr>
        <tr>
          <td colspan="3" height="270" valign="top">
            <div align="left">
            <table class="table">
                <tr>
                    <td colspan="3" style="width: 437px;"><span>Dengan data-data sebagai berikut : </span></td>
                    <td ><span>Perlengkapan </span></td>
                    <td align="center"><span>Ada </span></td>
                    <td align="center"><span>Tidak Ada </span></td>
                </tr>
                <tr>
                    <td style="width: 120px;"><span>Merk/Type/Th.</span></td>
                    <td><span>:</span></td>
                    <td><span>{{ $booking->product_name }}/{{ $booking->product_type }}/{{ $booking->product_year }}</span></td>
                    <td><span>Buku Service</span></td>
                    <td align="center">
                      <?php 
                        if($booking->service_book == 1) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                      
                    </td>
                    <td align="center">
                    <?php 
                        if($booking->service_book == 0) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;"><span>No. Rangka</span></td>
                    <td><span>:</span></td>
                    <td><span>{{ $booking->chassis_number }}</span></td>
                    <td><span>Buku Petunjuk </span></td>
                    <td align="center">
                      <?php 
                        if($booking->guide_book == 1) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                      
                    </td>
                    <td align="center">
                    <?php 
                        if($booking->guide_book == 0) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;"><span>No. Mesin</span></td>
                    <td><span>:</span></td>
                    <td><span>{{ $booking->machine_number }}</span></td>
                    <td><span>Buku Pedoman </span></td>
                    <td align="center">
                      <?php 
                        if($booking->guidelines_book == 1) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                      
                    </td>
                    <td align="center">
                    <?php 
                        if($booking->guidelines_book == 0) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;"><span>Warna</span></td>
                    <td><span>:</span></td>
                    <td><span>{{ $booking->product_colour }}</span></td>
                    <td><span>Tool Kit </span></td>
                    <td align="center">
                      <?php 
                        if($booking->tool_kit == 1) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                      
                    </td>
                    <td align="center">
                    <?php 
                        if($booking->tool_kit == 0) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;"><span>No. Polisi</span></td>
                    <td><span>:</span></td>
                    <td><span>{{ $booking->no_plat }}</span></td>
                    <td><span>Helm </span></td>
                    <td align="center">
                      <?php 
                        if($booking->helmet == 1) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                      
                    </td>
                    <td align="center">
                    <?php 
                        if($booking->helmet == 0) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;"></td>
                    <td></td>
                    <td></td>
                    <td><span>Jaket </span></td>
                    <td align="center">
                      <?php 
                        if($booking->jacket == 1) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                      
                    </td>
                    <td align="center">
                    <?php 
                        if($booking->jacket == 0) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                    </td>
                </tr>
                <tr>
                    <td style="width: 120px;"></td>
                    <td></td>
                    <td></td>
                    <td><span>Hadiah </span></td>
                    <td align="center">
                      <?php 
                        if($booking->gift == 1) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                      
                    </td>
                    <td align="center">
                    <?php 
                        if($booking->gift == 0) {
                      ?>
                      <span style="font-family: wingdings; font-size: 120%;">&#252;</span>
                      <?php
                      }
                      else {
                        echo "-";
                      }
                      ?>
                    </td>
                </tr>

            </table>
          </td>
        </tr>
        <tr>
          <td style="padding-right: 138px;">
            <div align="center" style="height: 110px">
              <span>Hormat Kami</span>
            </div>
            <div align="center">
              <span style="font-size: x-small;">
              <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              </u>
              </span>
            </div>
          </td>
          <td style="padding-right: 50px;">
            <div align="center" style="height: 110px">
              <span>Ekspedisi / Sopir</span>
            </div>
            <div align="center">
            <span style="font-size: x-small;">
              <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              </u>
              </span>
            </div>
          </td>
          <td >
            <div align="center" style="height: 110px">
              <span>Yang Menerima</span>
            </div>
            <div align="center">
            <span style="font-size: x-small;">
              <u>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              </u>
              </span>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </body>
</html>
<script type="text/javascript">
  window.print();
</script>