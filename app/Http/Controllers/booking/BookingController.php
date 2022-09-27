<?php

namespace App\Http\Controllers\booking;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\BookingGuest;
use App\Models\BookingType;
use App\Models\Product;
use App\Models\Subsidi;
use App\Models\BookingDocument;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
   public function index()
   {
      $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
      'booking.id_subsidi','booking.subsidi_value','booking.booking_type','bt.type_name',
      'cicilan_value','booking.booking_total','booking.booking_status','bg.title','bg.fullname','p.product_name','s.subsidi_type_name')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
      ->leftjoin('booking_type as bt','bt.id','=','booking.booking_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
      ->paginate(10);

      return view('content.booking.index',compact('booking'));
   }
   public function detail($id)
   {
      $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
      'booking.id_subsidi','booking.subsidi_value', 'booking.booking_type','booking.booking_type','bt.type_name',
      'cicilan_value','booking.booking_total','booking.booking_status','bg.title','bg.fullname','p.product_name','s.subsidi_type_name',
      'booking.created_at')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
      ->leftjoin('booking_type as bt','bt.id','=','booking.booking_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
      ->where('booking.id_booking',$id)
      ->first();
      return view('content.booking.detail.index',compact('booking'));
   }

   public function detailPrint($id)
   {
      $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
      'booking.id_subsidi','booking.subsidi_value', 'booking.booking_type','booking.booking_type','bt.type_name',
      'cicilan_value','booking.booking_total','booking.booking_status','bg.title','bg.fullname','p.product_name','s.subsidi_type_name',
      'booking.created_at')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
      ->leftjoin('booking_type as bt','bt.id','=','booking.booking_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
      ->where('booking.id_booking',$id)
      ->first();
      return view('content.booking.detail.detailPrint',compact('booking'));
   }

   public function create()
   {
      $product = Product::select('product_id','product_name','product_type')->where('status',1)->get();
      $subsidi = Subsidi::select('id','subsidi_type_name')->where('status',1)->get();
      $booking_type = BookingType::select('id','type_name')->where('status',1)->get();
      return view('content.booking.create',compact('product','subsidi','booking_type'));
   }
   public function store(Request $request)
   {
		try {
            $booking_count = Booking::count();
            $booking_id = "BOOK-00".$booking_count + 1;
            $product = Product::select('product_id','product_price')->where('product_id',$request->id_product)->first();
            $booking = Booking::create([
               'id_booking' => $booking_id,
               'id_product' => $request->id_product,
               'price_product' => $product->product_price ?? 0,
               'id_subsidi' => $request->id_subsidi,
               'subsidi_value' => $request->subsidi_value,
               'booking_type' => $request->booking_type,
               'cicilan_value' => $request->cicilan_value,
               'booking_total' => $request->booking_total,
               'payment_status' => 0,
               'booking_status' => 0,
               'created_by' => auth()->user()->id
            ]);

            $image = $this->uploadImageBase64($request->image_ktp, $booking_id);
            $booking_guest = BookingGuest::create([
               'id_booking' => $booking->id_booking ?? NULL,
               'title' => $request->title ?? NULL,
               'fullname' => $request->fullname ?? NULL,
               'id_number' => $request->id_number ?? NULL,
               'dateofbirth' => $request->dateofbirth,
               'address' => $request->address,
               'no_hp' => $request->no_hp,
               'identity_file' => $image
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('booking.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', $e);
         return redirect()->route('booking.index');
      }
   }
   public function edit($id)
   {
      // $cabang = Cabang::select('id','branch_name','branch_address')->where('status',2)->get();
      $product = Product::select('product_id','product_name','product_type')->where('status',1)->get();
      $subsidi = Subsidi::select('id','subsidi_type_name')->where('status',1)->get();
      $booking = Booking::where('id_booking',$id)->first();
      $booking_guest = BookingGuest::where('id_booking',$id)->first();
      $booking_type = BookingType::select('id','type_name')->where('status',1)->get();
      return view('content.booking.edit',compact('product','subsidi','booking','booking_guest','booking_type'));
   }
   public function update(Request $request, $id)
   {
		try {

         $booking = Booking::where('id_booking',$id)->first();
         $product = Product::select('product_id','product_price')->where('product_id',$request->id_product)->first();
         $booking->update([
            'id_product' => $request->id_product,
            'price_product' => $product->product_price ?? 0,
            'id_subsidi' => $request->id_subsidi,
            'subsidi_value' => $request->subsidi_value,
            'booking_type' => $request->booking_type,
            'cicilan_value' => $request->cicilan_value,
            'booking_total' => $request->booking_total,
            'payment_status' => $request->payment_status,
            'booking_status' => $request->booking_status
         ]);
         $booking_guest = BookingGuest::where('id_booking',$id)->first();
         if(isset($request->image_ktp))
         {
            $image = $this->uploadImageBase64($request->image_ktp, $id);
         }
         else {
            $image = $booking_guest->identity_file;
         }
         $booking_guest->update([
            'title' => $request->title,
            'fullname' => $request->fullname,
            'dateofbirth' => $request->dateofbirth,
            'id_number' => $request->id_number,
            'address' => $request->address,
            'no_hp' => $request->no_hp,
            'identity_file' => $image
         ]);

         \Session::flash('success.message', 'Data berhasil diubah');
         return redirect()->route('booking.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', $e);
         return redirect()->route('booking.index');
      }
   }
   public function delete($id)
	{
		$booking = Booking::where('id_booking',$id)->first();
      $booking->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('booking.index');
	}


   public function approve($id)
	{
		$booking = Booking::where('id_booking',$id)->first();
      $booking->update([
         'booking_status' => 1
      ]);
      \Session::flash('success.message', 'Data berhasil disetujui');
      return redirect()->route('booking.detail', $id);
	}
   public function approvePayment($id)
	{
		$booking = Booking::where('id_booking',$id)->first();
      $booking->update([
         'payment_status' => 1
      ]);
      \Session::flash('success.message', 'Data berhasil disetujui');
      return redirect()->route('booking.detail', $id);
	}
   private function uploadImageBase64($base64, $slug)
   {
      $tmpFilePath = 'ktp/';
      
      $tmpFileDate =  date('Y-m') .'/'.date('d').'/';
      $tmpFileName = $slug.'-'.str::random(20).'_'.time();

      $image = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
      $this->makeimagedir($tmpFilePath.$tmpFileDate);
      $saveFilePath = $tmpFilePath.$tmpFileDate.$tmpFileName;
      $pos = explode(',', $base64);
      $ini =substr($pos[0], 11);
      $type = explode(';', $ini);
      $file_type = $type[0];
      
      // \Storage::disk('local')->put($saveFilePath.'.'.$file_type, $image);
      
      file_put_contents($saveFilePath.'.'.$file_type, $image);
      return $saveFilePath.'.'.$file_type;
   }

   public function document($id)
   {
      $booking = Booking::where('id_booking',$id)->first();
      $booking_guest = BookingGuest::where('id_booking',$id)->first();
      $booking_document = BookingDocument::where('id_booking',$id)->first();
      return view('content.booking.detail.travelDocument',compact('booking','booking_guest','booking_document'));
   }
   public function documentPrint($id)
   {
      $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
      'booking.id_subsidi','booking.subsidi_value', 'booking.booking_type','booking.booking_type','bt.type_name',
      'cicilan_value','booking.booking_total','booking.booking_status','bg.title','bg.fullname','p.product_name','s.subsidi_type_name',
      'booking.created_at')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
      ->leftjoin('booking_type as bt','bt.id','=','booking.booking_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
      ->where('booking.id_booking',$id)
      ->first();
      return view('content.booking.detail.travelDocumentPrint',compact('booking'));
   }
   public function documentStore(Request $request, $id)
   {
		try {
            $booking_document = BookingDocument::where('id_booking',$id)->first();
            if(isset($booking_document)){
               $booking_document->update([
                  'chassis_number' => $request->chassis_number,
                  'machine_number' => $request->machine_number,
                  'no_plat' => $request->no_plat,
                  'colour' => $request->colour,
                  'service_book' => $request->service_book ?? 0,
                  'guide_book' => $request->guide_book ?? 0,
                  'guidelines_book' => $request->guidelines_book ?? 0,
                  'tool_kit' => $request->tool_kit ?? 0,
                  'helmet' => $request->helmet ?? 0,
                  'jacket' => $request->jacket ?? 0,
                  'gift' => $request->gift ?? 0,
               ]);
            }
            else {
               BookingDocument::create([
                  'id_booking' => $id,
                  'chassis_number' => $request->chassis_number,
                  'machine_number' => $request->machine_number,
                  'no_plat' => $request->no_plat,
                  'colour' => $request->colour,
                  'service_book' => $request->service_book ?? 0,
                  'guide_book' => $request->guide_book ?? 0,
                  'guidelines_book' => $request->guidelines_book ?? 0,
                  'tool_kit' => $request->tool_kit ?? 0,
                  'helmet' => $request->helmet ?? 0,
                  'jacket' => $request->jacket ?? 0,
                  'gift' => $request->gift ?? 0,
               ]);
            }
            $booking_count = Booking::count();
            $booking_id = "BOOK-00".$booking_count + 1;
            $product = Product::select('product_id','product_price')->where('product_id',$request->id_product)->first();
            $booking = Booking::create([
               'id_booking' => $booking_id,
               'id_product' => $request->id_product,
               'price_product' => $product->product_price ?? 0,
               'id_subsidi' => $request->id_subsidi,
               'subsidi_value' => $request->subsidi_value,
               'booking_type' => $request->booking_type,
               'cicilan_value' => $request->cicilan_value,
               'booking_total' => $request->booking_total,
               'payment_status' => 0,
               'booking_status' => 0,
               'created_by' => auth()->user()->id
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('booking.document', $id);

      } catch(\Exception $e) {
         \Session::flash('error.message', $e);
         return redirect()->route('booking.document', $id);
      }
   }

   private function makeimagedir($path)
    {
        if (!file_exists(public_path() .'/'. $path )) {
            $oldmask = umask(0);
            mkdir(public_path() .'/'. $path , 0777, true);
            umask($oldmask);
        }
        return;
    }
    
}
