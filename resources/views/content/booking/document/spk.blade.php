<html>
  <head>
    <title>Surat Pesanan Kendaraan</title>
    <style type="text/css" media="print">
      @page {
        margin: 0 -6cm;
        width: 21cm;
        height: 29.7cm; 
        
      }

      html {
        margin: 0 6cm
      }
      
    </style>
    <style>
        input{
            border: 2px solid #645f5f;
            height: 20px;
            width: 100%;
            padding: 10px;
            /* box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box; */
        }

        .checkbox {
            width:20px;
            height:15px;
            border: 1px solid #000;
            display: inline-block;
        }

            /* This is what simulates a checkmark icon */
        .checkbox.checked:after {
            content: '';
            display: block;
            width: 4px;
            height: 7px;
            
            /* "Center" the checkmark */
            position:relative;
            top:4px;
            left:7px;
            
            border: solid #000;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
    </style>
  </head>
  <body>
  <?php $dateNow = Carbon\Carbon::now(); ?>
    <table border="1" width="100%">
      <tbody>
        <tr>
          <!-- <td>
            <div>
            <img src="{{ asset('assets/img/icon/logo.png') }}" style="width: 100px;">
            </div>
          </td> -->
          <td colspan="3">
            <div align="left">
                <img src="{{ asset('assets/img/icon/logo.png') }}" style="width: 100px;">
            </div>
            <div align="center">
              <span style="font-family: Verdana; font-size: medium;">
                <b>SURAT PESANAN KENDARAAN</b>
              </span>
            </div>
            <div align="right">
                <span style="font-size: small;">Tanggal</span>
                <span style="font-size: small;">:</span>
                <span style="font-size: small;">{{ date("d-m-Y") }}</span>
            </div>
          </td>
        </tr>
        <tr>
            <td colspan="3">
                <div align="center">
                <span style="font-family: Verdana; font-size: small;">
                    <b>Data Konsumen</b>
                </span>
                </div>
                <table border="0" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 11%;">Nama Lengkap</td>
                            <td colspan="5" style="width: 100%;"><input type="text" value="{{ $booking_guest->fullname }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Nomor KTP</td>
                            <td colspan="2"><input type="text" value="{{ $booking_guest->id_number }}"></td>
                            <td style="width: 13%;">Jenis Kelamin</td>
                            <td colspan="2">
                                <div class="checkbox <?php if($booking_guest->gender == 'laki-laki') { echo "checked"; } ?>"></div>  Laki-laki
                                <div class="checkbox <?php if($booking_guest->gender == 'perempuan') { echo "checked"; } ?>"></div>  Perempuan
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 13%;">Tempat Lahir</td>
                            <td colspan="2"><input type="text" value="{{ $booking_guest->placeofbirth }}"></td>
                            <td style="width: 13%;">Tanggal Lahir</td>
                            <td colspan="1"><input type="text" value="{{ $booking_guest->dateofbirth }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Alamat</td>
                            <td colspan="5"><input  type="text" value="{{ $booking_guest->address }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Kota/Kabupaten</td>
                            <td><input type="text" value="{{ $booking_guest->city }}"></td>
                            <td style="width: 11%;">RT</td>
                            <td><input type="text" value="{{ $booking_guest->rt }}"></td>
                            <td style="width: 11%;">RW</td>
                            <td><input type="text" value="{{ $booking_guest->rw }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Kecamatan</td>
                            <td><input type="text" value="{{ $booking_guest->districts }}"></td>
                            <td style="width: 11%;">Kelurahan</td>
                            <td colspan="3"><input type="text" value="{{ $booking_guest->ward }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Kode Pos</td>
                            <td><input type="text" value="{{ $booking_guest->postal_code }}"></td>
                            <td style="width: 11%;">Telepon</td>
                            <td><input type="text" value="{{ $booking_guest->no_telp }}"></td>
                            <td style="width: 11%;">HP</td>
                            <td><input type="text" value="{{ $booking_guest->no_hp }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 13%;">Instansi</td>
                            <td colspan="2">
                                @foreach($instansi as $row)
                                <div class="checkbox <?php if($booking_guest->agency == $row->id) { echo "checked"; } ?>" ></div>  {{ $row->name }}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            
                            <td style="width: 13%;">Faktur Pajak</td>
                            <td colspan="">
                                <div class="checkbox <?php if($booking_guest->faktur_pajak_status == 1) { echo "checked"; } ?>"></div>  Ya <br>
                                <div class="checkbox <?php if($booking_guest->faktur_pajak_status == 0) { echo "checked"; } ?>"></div>  Tidak
                            </td>
                            <td style="width: 11%;">NPWP</td>
                            <td colspan="3"><input type="text" value="{{ $booking_guest->npwp }}"></td>
                        </tr>
                        
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div align="center">
                <span style="font-family: Verdana; font-size: small;">
                    <b>Data Motor Pesanan</b>
                </span>
                </div>
                <table border="0" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 11%;">Type Motor</td>
                            <td><input type="text" value="{{ $product->product_name }}">
                            
                            </td>
                            <td style="width: 11%;">Warna</td>
                            <td ><input type="text" value="{{ $product->product_colour }}"></td>
                            <td style="width: 11%;">Tahun</td>
                            <td ><input type="text" value="{{ $product->product_year }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Harga</td>
                            <td style="width: 20%;"colspan="1">
                                <div class="checkbox <?php if($booking->type_price_product == 'otr') { echo "checked"; } ?>"></div>  OTR
                                <div class="checkbox <?php if($booking->type_price_product == 'off') { echo "checked"; } ?>"></div>  OFF
                            </td>
                            <td style="width: 11%;">Rp</td>
                            <td colspan="" style="width: 20%;" style="width: 100%;">
                                <input type="text" value="{{ $booking->price_product }}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Program Penjualan</td>
                            <td colspan="5" style="width: 100%;"><input type="text" value="{{ $booking->sales_program }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Jumlah Tanda Jadi (Rp)</td>
                            <td colspan="3" style="width: 100%;"><input type="text" value="{{ $booking->booking_total }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 13%;">Pembayaran</td>
                            <td colspan="5">
                                @foreach($booking_type as $row)
                                <div class="checkbox <?php if($booking->booking_type == $row->id) { echo "checked"; } ?>" ></div>  {{ $row->name }}
                                @endforeach
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div align="center">
                <span style="font-family: Verdana; font-size: small;">
                    <b>Data Pembiayaan Konsumen</b>
                </span>
                </div>
                <table border="0" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td style="width: 13%;">Finco</td>
                            <td colspan="5">
                                @foreach($finco as $row)
                                <div class="checkbox <?php if($booking_guest->finco == $row->id) { echo "checked"; } ?>" ></div>  {{ $row->name }}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Uang Muka</td>
                            <td colspan=""><input type="text" value="{{ $booking->booking_total }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Angsuran Perbulan</td>
                            <td style="width: 20%;"><input type="text" value="{{ $booking->monthly_installment }}"></td>
                            <td style="width: 11%;">Tenor</td>
                            <td colspan="" style="width: 20%;" style="width: 100%;">
                                <input type="text" value="{{ $booking->cicilan_value }}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Catatan</td>
                            <td colspan="5" style="width: 100%;"><input type="text" value="{{ $booking->notes }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Nama Ibu Kandung</td>
                            <td colspan="5" style="width: 100%;"><input type="text" value="{{ $booking_guest->mother_name }}"></td>
                        </tr>
                        <tr>
                            <td style="width: 13%;">Status Kawin</td>
                            <td colspan="5">
                                @foreach($marriage_status as $row)
                                <div class="checkbox <?php if($booking_guest->marriage_status == $row->id) { echo "checked"; } ?>" ></div>  {{ $row->name }}
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 13%;">Status Rumah</td>
                            <td colspan="3">
                                @foreach($home_status as $row)
                                <div class="checkbox <?php if($booking_guest->home_status == $row->id) { echo "checked"; } ?>" ></div>  {{ $row->name }}
                                @endforeach
                            </td>
                            <td style="width: 11%;">Lama Tinggal</td>
                            <td>
                                Bulan<input type="text" value="{{ $booking_guest->year_long_stay }}"> <br>
                                Tahun<input type="text" value="{{ $booking_guest->month_long_stay }}">
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 11%;">Jumlah Tanggungan</td>
                            <td colspan="3"><input type="text" value="{{ $booking_guest->dependents }}"></td>
                        </tr>
                        
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <div align="center">
                <span style="font-family: Verdana; font-size: small;">
                    <b>Cheklist Kelengkapan Dokumen Pembiayaan</b>
                </span>
                </div>
                <table border="0" cellpadding="1" width="100%">
                    <tbody>
                        <tr>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->owner_ktp) == 1) { echo "checked"; } ?>" ></div>  KTP Pemilik
                            </td>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->checking_account) == 1) { echo "checked"; } ?>" ></div>  Rekening Koran/Tabungan
                            </td>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->marriage_certificate) == 1) { echo "checked"; } ?>" ></div>  Surat Nikah
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->applicants_ktp) == 1) { echo "checked"; } ?>" ></div>  KTP Pemohon
                            </td>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->salary_slip) == 1) { echo "checked"; } ?>" ></div>  Slip Gaji/SKP
                            </td>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->wife_ktp) == 1) { echo "checked"; } ?>" ></div>  KTP Istri
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->guarantor_ktp) == 1) { echo "checked"; } ?>" ></div>  KTP Penjamin
                            </td>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->sku) == 1) { echo "checked"; } ?>" ></div>  SKU/SIUP
                            </td>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->family_card) == 1) { echo "checked"; } ?>" ></div>  Kartu Keluarga
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->electricity_bills) == 1) { echo "checked"; } ?>" ></div>  Rekening Listrik/PBB
                            </td>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->npwp) == 1) { echo "checked"; } ?>" ></div>  NPWP
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->engine_friction) == 1) { echo "checked"; } ?>" ></div>  Gesekan Nomor Rangka dan Mesin
                            </td>
                            <td>
                                <div class="checkbox <?php if(isset($booking_document_finance->other) == 1) { echo "checked"; } ?>" ></div>  Lainnya
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        
        <!-- <tr>
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
        </tr> -->
      </tbody>
    </table>
  </body>
</html>
<script type="text/javascript">
  window.print();
</script>
