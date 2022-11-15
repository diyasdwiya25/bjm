@extends('layouts/contentNavbarLayout')

@section('title', ' Edit - Pemesanan')

@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
<style>
    #my_camera video {
        width: auto !important;
        height: auto !important;
        min-width: 100px;
        min-height: 100px;
    }
</style>
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Pemesanan/</span> Form</h4>

<!-- Basic Layout -->
<div class="row">
  <div class="col-xl">
  <form action="{{ route('booking.update', $booking->id_booking) }}" method="POST">
    @csrf
    <div class="col-md-12">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Konsumen</h5>
          </div>
          <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Nama Lengkap*</label>
                <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Lengkap" value="{{ $booking_guest->fullname }}" name="fullname" required/>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">Nomor KTP*</label>
                    <input type="number" class="form-control" id="basic-default-name" placeholder="0123456789" name="id_number" value="{{ $booking_guest->id_number }}" required/>
                  </div>
                </div>
                <div class="col-md-4">
                <label class="form-label" for="basic-default-product-code">Jenis Kelamin*</label>
                  <div class="col-md">
                    <div class="form-check form-check-inline mt-3">
                      <input class="form-check-input" type="radio" id="inlineCheckbox1" name="gender" <?php if($booking_guest->gender == 'laki-laki') { echo "checked"; } ?> value="laki-laki">
                      <label class="form-check-label" for="inlineCheckbox1">Laki-laki</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineCheckbox2" name="gender" <?php if($booking_guest->gender == 'perempuan') { echo "checked"; } ?> value="perempuan">
                      <label class="form-check-label" for="inlineCheckbox2">Perempuan</label>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">Tempat Lahir*</label>
                    <input type="text" class="form-control" id="basic-default-name" placeholder="" value="{{ $booking_guest->placeofbirth }}" name="placeofbirth" required/>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">Tanggal Lahir*</label>
                    <input type="date" class="form-control" id="basic-default-name" name="dateofbirth" value="{{ $booking_guest->dateofbirth }}" required/>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-description">Alamat*</label>
                <textarea id="basic-default-message" class="form-control" placeholder="" name="address" required>{{ $booking_guest->address }}</textarea>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">Kota / Kabupaten</label>
                    <input type="text" class="form-control" id="basic-default-name" placeholder="" value="{{ $booking_guest->city }}" name="city"/>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">RT</label>
                    <input type="number" class="form-control" id="basic-default-name" name="rt" value="{{ $booking_guest->rt }}"/>
                  </div>
                </div>
                <div class="col-md-2">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">RW</label>
                    <input type="number" class="form-control" id="basic-default-name" name="rw" value="{{ $booking_guest->rw }}"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-7">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">Kecamatan</label>
                    <input type="text" class="form-control" id="basic-default-name" placeholder="" name="districts" value="{{ $booking_guest->districts }}"/>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">Kelurahan</label>
                    <input type="text" class="form-control" id="basic-default-name" name="ward" value="{{ $booking_guest->ward }}"/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">Kode Pos</label>
                    <input type="text" class="form-control" id="basic-default-name" placeholder="" name="postal_code" value="{{ $booking_guest->postal_code }}"/>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">Telepon</label>
                    <input type="number" class="form-control" id="basic-default-name" name="no_telp" value="{{ $booking_guest->no_telp }}"/>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">HP*</label>
                    <input type="number" class="form-control" id="basic-default-name" name="no_hp" value="{{ $booking_guest->no_hp }}" required/>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <label class="form-label" for="basic-default-product-code">Instansi</label>
                  <div class="col-md">
                  @foreach($instansi as $row)
                    <div class="form-check form-check-inline mt-3">
                      <input class="form-check-input" type="radio" id="inlineCheckbox{{ $row->id }}" name="agency" value="{{ $row->id }}" <?php if($booking_guest->agency == $row->id) { echo "checked"; } ?>>
                      <label class="form-check-label" for="inlineCheckbox{{ $row->id }}">{{ $row->name }}</label>
                    </div>
                  @endforeach
                  </div>
                </div>
              </div>
              <br>
              <div class="row">
                <div class="col-md-2">
                <label class="form-label" for="basic-default-product-code">Faktur Pajak</label>
                  <div class="col-md">
                    <div class="form-check form-check-inline mt-3">
                      <input class="form-check-input" type="radio" id="inlineCheckbox1" name="faktur_pajak_status" value="1" <?php if($booking_guest->faktur_pajak_status == 1) { echo "checked"; } ?>>
                      <label class="form-check-label" for="inlineCheckbox1">Ya</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" id="inlineCheckbox2" name="faktur_pajak_status" value="0" <?php if($booking_guest->faktur_pajak_status == 0) { echo "checked"; } ?>>
                      <label class="form-check-label" for="inlineCheckbox2">Tidak</label>
                    </div>
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="mb-3">
                    <label class="form-label" for="basic-default-product-code">NPWP</label>
                    <input type="number" class="form-control" id="basic-default-name" placeholder="0123456789" name="npwp"  value="{{ $booking_guest->npwp }}" required/>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Data Motor Pesanan</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="basic-default-branch">Type Motor*</label>
            <select id="id_product" class="select2 form-select" name="id_product" required>
              @foreach($product as $row)
              <option value="{{ $row->product_id }}" <?php if($booking->product_id == $row->product_id) { echo "selected"; } ?>>{{ $row->product_name }} - {{ $row->product_type}}</option>
              @endforeach
            </select>
          </div>
          <div class="row">
            <div class="col-md-2">
            <label class="form-label" for="basic-default-product-code">Harga</label>
              <div class="col-md">
                <div class="form-check form-check-inline mt-3">
                  <input class="form-check-input" type="radio" id="otr" name="type_price_product" <?php if($booking->type_price_product == 'otr') { echo "checked"; } ?> value="otr">
                  <label class="form-check-label" for="otr">OTR</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" id="off" name="type_price_product" <?php if($booking->type_price_product == 'off') { echo "checked"; } ?> value="off">
                  <label class="form-check-label" for="off">OFF</label>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Rp</label>
                <input type="number" class="form-control" id="price_product" placeholder="0123456789" name="price_product" value="{{ $booking->price_product }}" <?php if($booking->type_price_product == 'otr') { echo "readonly"; } ?>/>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Program Penjualan</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="" name="sales_program" value="{{ $booking->sales_program }}"/>
          </div>
          <div class="row">
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-branch">Tipe Subsidi</label>
                <select id="status" class="select2 form-select" name="id_subsidi">
                <option value="0">Pilih</option>
                  @foreach($subsidi as $row)
                  <option value="{{ $row->id }}" <?php if($booking->id_subsidi == $row->id) { echo "selected"; } ?>>{{ $row->subsidi_type_name }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-5">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Nominal Subsidi</label>
                <input type="number" class="form-control" id="subsidi_value" placeholder="" name="subsidi_value" value="{{ $booking->subsidi_value }}" readonly/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="basic-default-branch">Mediator(Rp)</label>
                <input type="number" class="form-control" id="basic-default-name" placeholder="" name="amount_fee"  value="{{ $mediator->amount_fee ?? '' }}"/>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Nama Mediator</label>
                <input type="text" class="form-control" id="basic-default-name" placeholder="" name="mediator_name" value="{{ $mediator->mediator_name ?? '' }}"/>
              </div>
            </div>
            <div class="col-md-4">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">No Hp/Telp Mediator</label>
                <input type="number" class="form-control" id="basic-default-name" placeholder="" name="no_hp_mediator" value="{{ $mediator->no_hp ?? '' }}"/>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Jumlah Tanda Jadi</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="" name="booking_total" value="{{ $booking->booking_total }}"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Pembayaran</label>
            <div class="col-md">
              @foreach($booking_type as $row)
                <div class="form-check form-check-inline mt-3">
                  <input class="form-check-input" type="radio" id="inlineCheckbox{{ $row->id }}" name="booking_type" value="{{ $row->id }}" <?php if($booking->booking_type == $row->id) { echo "checked"; } ?>>
                  <label class="form-check-label" for="inlineCheckbox{{ $row->id }}">{{ $row->name }}</label>
                </div>
              @endforeach
            </div>
          </div>
          @if(Auth::user()->user_level == 1)
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Status</label>
            <select id="status" class="select2 form-select" name="booking_status" required>
              <option value="0" <?php if($booking->booking_status == 0){ echo "selected"; } ?>>Belum Disetujui</option>
              <option value="1" <?php if($booking->booking_status == 1){ echo "selected"; } ?>>Disetujui</option>
              <option value="2" <?php if($booking->booking_status == 2){ echo "selected"; } ?>>Tidak Disetujui</option>
            </select>
          </div>
          @endif
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Status Pembayaran</label>
            <select id="status" class="select2 form-select" name="payment_status" <?php if($booking->booking_status != 1) { echo "disabled"; } ?> required>
              <option value="0" <?php if($booking->payment_status == 0){ echo "selected"; } ?>>Belum</option>
              <option value="1" <?php if($booking->payment_status == 1){ echo "selected"; } ?>>Sudah</option>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Data Pembiayaan Konsumen</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Finco</label>
            <div class="col-md">
              @foreach($finco as $row)
                <div class="form-check form-check-inline mt-3">
                  <input class="form-check-input" type="radio" id="inlineCheckbox{{ $row->id }}" name="finco" value="{{ $row->id }}" <?php if($booking->finco == $row->id) { echo "checked"; } ?>>
                  <label class="form-check-label" for="inlineCheckbox{{ $row->id }}">{{ $row->name }}</label>
                </div>
              @endforeach
              <div class="form-check form-check-inline mt-3">
                <input class="form-check-input" type="radio" id="lainnya" name="finco" value="0" <?php if($booking->finco == 0) { echo "checked"; } ?>>
                <label class="form-check-label" for="lainnya">LAINNYA</label>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Lainnya</label>
                <input type="text" class="form-control" id="finco_other" placeholder="" name="finco_other" value="<?php if($booking->finco == 0) { echo $booking->finco_other; } ?>" <?php if($booking->finco != 0) { echo "disabled"; } ?>/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Angsuran Perbulan</label>
                <input type="number" class="form-control" id="basic-default-name" placeholder="" name="monthly_installment" value="{{ $booking->monthly_installment }}"/>
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Tenor(Bulan)</label>
                <input type="number" class="form-control" id="basic-default-name" placeholder="" name="cicilan_value" value="{{ $booking->cicilan_value }}"/>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Catatan</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="" name="notes" value="{{ $booking->notes }}"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Nama Ibu Kandung</label>
            <input type="text" class="form-control" id="basic-default-name" placeholder="" name="mother_name" value="{{ $booking_guest->mother_name }}"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Status Kawin</label>
            <div class="col-md">
              @foreach($marriage_status as $row)
                <div class="form-check form-check-inline mt-3">
                  <input class="form-check-input" type="radio" id="inlineCheckbox{{ $row->id }}" name="marriage_status" value="{{ $row->id }}" <?php if($booking_guest->marriage_status == $row->id) { echo "checked"; } ?>>
                  <label class="form-check-label" for="inlineCheckbox{{ $row->id }}">{{ $row->name }}</label>
                </div>
              @endforeach
            </div>
          </div>
          <div class="row">
            <div class="col-md-5">
              <label class="form-label" for="basic-default-product-code">Status Rumah</label>
              <div class="col-md">
                @foreach($home_status as $row)
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="radio" id="inlineCheckbox{{ $row->id }}" name="home_status" value="{{ $row->id }}" <?php if($booking_guest->home_status == $row->id) { echo "checked"; } ?>>
                    <label class="form-check-label" for="inlineCheckbox{{ $row->id }}">{{ $row->name }}</label>
                  </div>
                @endforeach
              </div>
            </div>
            <div class="col-md-3">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Lama Tinggal</label> 
                <br>
                <label class="form-label" for="basic-default-product-code">Tahun</label>
                <input type="number" class="form-control" id="basic-default-name" placeholder="" name="year_long_stay" value="{{ $booking_guest->year_long_stay }}"/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Bulan</label>
                <input type="number" class="form-control" id="basic-default-name" placeholder="" name="month_long_stay" value="{{ $booking_guest->month_long_stay }}"/>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Jumlah Tanggungan(orang)</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="" name="dependents" value="{{ $booking_guest->dependents }}"/>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Cheklist Kelengkapan Dokumen Pembiayaan</h5>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-4">
              <div class="col-md">
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="owner_ktp" <?php if($booking_document_finance->owner_ktp ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">KTP Pemilik</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="applicants_ktp" <?php if($booking_document_finance->applicants_ktp ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">KTP Pemohon</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="guarantor_ktp" <?php if($booking_document_finance->guarantor_ktp ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">KTP Penjamin</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="electricity_bills" <?php if($booking_document_finance->electricity_bills ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Rekening Listrik/PBB</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="engine_friction" <?php if($booking_document_finance->engine_friction ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Gesekan Nomor Rangka dan Mesin</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="col-md">
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="checking_account" <?php if($booking_document_finance->checking_account ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Rekening Koran/Tabungan</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="salary_slip" <?php if($booking_document_finance->salary_slip ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Slip Gaji/SKP</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="sku" <?php if($booking_document_finance->sku ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">SKU/SIUP</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3"> 
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="npwp_doc" <?php if($booking_document_finance->npwp ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">NPWP</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="other" <?php if($booking_document_finance->other ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Lainnya</label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="col-md">
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="marriage_certificate" <?php if($booking_document_finance->marriage_certificate ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Surat Nikah</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="wife_ktp" <?php if($booking_document_finance->wife_ktp ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">KTP Istri</label>
                  </div>
                </div>
                <div class="row">
                  <div class="form-check form-check-inline mt-3">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="family_card" <?php if($booking_document_finance->family_card ?? 0 == 1) { echo "checked"; } ?> value="1">
                    <label class="form-check-label" for="inlineCheckbox1">Kartu Keluarga</label>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h5 class="mb-0">Detail Pemesanan</h5>
        </div>
        <div class="card-body demo-vertical-spacing demo-only-element">
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Unggah KTP</label>
            <div class="input-group">
              <button class="btn btn-outline-primary" id="btn-camera" type="button" id="inputGroupFileAddon03">Camera</button>
              <input type="file" class="form-control" id="upload-ktp" onchange="readURL(this);" aria-describedby="inputGroupFileAddon03" name="file_identitas" aria-label="Upload">
            </div>
            <br>
            <p class="font-italic text-black text-center">The image uploaded will be rendered inside the box below.</p>
            <div class="image-area mt-4"><img id="imageResult" src="{{ asset($booking_guest->identity_file) }}" alt="" class="img-fluid rounded shadow-sm mx-auto d-block"></div>
            <input type="hidden" class="form-control" id="imageResultText" placeholder="" name="image_ktp"/>
          </div>
          
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
        <button type="submit" class="btn btn-primary">Kirim</button>
        </div>
      </div>
    </div>
  </form>
  </div>
  
</div>

<div class="modal fade" id="camera" data-bs-backdrop="static" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <form class="modal-content">
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <p id="my_camera"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" id="btn-close">Close</button>
        <button type="button" class="btn btn-primary" id="btn-take-snapshot" onClick="take_snapshot()">Ambil Gambar</button>
      </div>
    </form>
  </div>
</div>

@endsection
@section('footer')
<script src="{{ asset('assets/js/webcam.min.js') }}"></script>
<script>
  $(document).ready(function(){
        $("#btn-camera").click(function(){
            Webcam.set({
              width: 320,
              height: 240,
              image_format: 'jpeg',
              jpeg_quality: 90
            });

            Webcam.attach('#my_camera');
            $("#camera").modal('show');
        });

        $("#btn-take-snapshot").click(function(){
            Webcam.reset('#my_camera');
            $("#camera").modal('hide');
        });

        $("#btn-close").click(function(){
            Webcam.reset('#my_camera');
            $("#camera").modal('hide');
        });
    });
</script>
<script>
  
  
  function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function (e) {
              $('#imageResult').attr('src', e.target.result);
              $('#imageResultText').attr('value', e.target.result);
          };
          reader.readAsDataURL(input.files[0]);
      }
  }

  // $(function () {
  //     $('#upload').on('change', function () {
  //         readURL(input);
  //     });
  // });
</script>
<script>
    function take_snapshot() {
      Webcam.snap( function(data_uri) {
          // display results in page
          $('#imageResult').attr('src', data_uri);
          $('#imageResultText').attr('value', data_uri);
        });
    }

    $(function () {
        $("input[name='type_price_product']").change(function () {
            if ($(this).val() == "off") {
              price_input = document.getElementById("price_product");
              price_input.value = 0;
              $('input[name="price_product"]').prop("readonly", false);
            } else {
              var productId = document.getElementById("id_product").value;
              var url = "{{ url('booking/getPrice') }}/" + productId;
              $.get(url, function(data) {
                price_input = document.getElementById("price_product");
                if (price_input) {
                  price_input.value = data.product_price;
                } else {
                  console.log('input does not exist');
                }
              });
              $('input[name="price_product"]').prop("readonly", true);
            }
        });
    });

    $(function () {
        $("select[name='id_subsidi']").change(function () {
            if ($(this).val() == 0) {
              subsidi_value = document.getElementById("subsidi_value");
              subsidi_value.value = 0;
            } else {
              var url = "{{ url('booking/getSubsidi') }}/" + $(this).val();
              $.get(url, function(data) {
                subsidi_value = document.getElementById("subsidi_value");
                if (subsidi_value) {
                  subsidi_value.value = data.subsidi_value;
                } else {
                  console.log('input does not exist');
                }
              });
            }
        });
    });

    $(function () {
        $("input[name='finco']").change(function () {
            if ($(this).val() == 0) {
              $('input[name="finco_other"]').prop("disabled", false);
            } else {
              note = document.getElementById("finco_other");
              note.value = "";
              $('input[name="finco_other"]').prop("disabled", true);
            }
        });
    });
</script>
@endsection