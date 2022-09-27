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
            <h5 class="mb-0">Info Pemesanan</h5>
          </div>
          <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Title</label>
                <select id="status" class="select2 form-select" name="title" required>
                  <option value="Mr." <?php if($booking->title == "Mr."){ echo "selected"; } ?>>Mr</option>
                  <option value="Mrs." <?php if($booking->title == "Mrs."){ echo "selected"; } ?>>Mrs</option>
                </select>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Nama Lengkap*</label>
                <input type="text" class="form-control" id="basic-default-name" placeholder="Nama Lengkap" name="fullname" value="{{ $booking_guest->fullname }}" required/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Tanggal Lahir</label>
                <input type="date" class="form-control" id="basic-default-name" name="dateofbirth" value="{{ $booking_guest->dateofbirth }}" required/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Nomor Identitas*</label>
                <input type="number" class="form-control" id="basic-default-name" placeholder="0123456789" name="id_number" value="{{ $booking_guest->id_number }}" required/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-code">Nomor Telepon*</label>
                <input type="number" class="form-control" id="basic-default-name" placeholder="0123456789" name="no_hp" value="{{ $booking_guest->no_hp }}" required/>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-product-description">Alamat*</label>
                <textarea id="basic-default-message" class="form-control" placeholder="" name="address" required>{{ $booking_guest->address }}</textarea>
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
          <h5 class="mb-0">Produk Pemesanan</h5>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label class="form-label" for="basic-default-branch">Produk*</label>
            <select id="status" class="select2 form-select" name="id_product" required>
              @foreach($product as $row)
              <option value="{{ $row->product_id }}" <?php if($booking->id_product == $row->product_id){ echo "selected"; } ?>>{{ $row->product_name }} - {{ $row->product_type}}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-branch">Tipe Pemesanan</label>
            <select id="status" class="select2 form-select" name="booking_type" required>
              @foreach($booking_type as $row)
              <option value="{{ $row->id }}" <?php if($booking->booking_type == $row->id){ echo "selected"; } ?>>{{ $row->type_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Jumlah Cicilan</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="" value="{{ $booking->cicilan_value }}" name="cicilan_value"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-branch">Tipe Subsidi</label>
            <select id="status" class="select2 form-select" name="id_subsidi">
            <option value="0">Pilih</option>
              @foreach($subsidi as $row)
              <option value="{{ $row->id }}" <?php if($booking->id_subsidi == $row->id){ echo "selected"; } ?>>{{ $row->subsidi_type_name }}</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Nominal Subsidi</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="" name="subsidi_value" value="{{ $booking->subsidi_value }}"/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Total Pembayaran*</label>
            <input type="number" class="form-control" id="basic-default-name" placeholder="" name="booking_total" value="{{ $booking->booking_total }}" required/>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Status</label>
            <select id="status" class="select2 form-select" name="booking_status" required>
              <option value="0" <?php if($booking->booking_status == 0){ echo "selected"; } ?>>Belum Disetujui</option>
              <option value="1" <?php if($booking->booking_status == 1){ echo "selected"; } ?>>Disetujui</option>
              <option value="2" <?php if($booking->booking_status == 2){ echo "selected"; } ?>>Tidak Disetujui</option>
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label" for="basic-default-product-code">Status Pembayaran</label>
            <select id="status" class="select2 form-select" name="payment_status" required>
              <option value="0" <?php if($booking->payment_status == 0){ echo "selected"; } ?>>Belum</option>
              <option value="1" <?php if($booking->payment_status == 1){ echo "selected"; } ?>>Sudah</option>
            </select>
          </div>
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
</script>
@endsection