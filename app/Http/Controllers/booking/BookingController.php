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
use App\Models\ParameterDetail;
use App\Models\BookingDocumentFinance;
use App\Models\User;
use App\Models\Mediator;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
   public function index()
   {
      $user = User::select('user.id','user.user_branch')->where('user.id',auth()->user()->id)->first();
      if(Auth::user()->user_level == 1){
         $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
         'booking.id_subsidi','booking.subsidi_value','booking.booking_type','bt.name as type_name',
         'cicilan_value','booking.booking_total','booking.booking_status','bg.fullname','p.product_name','s.subsidi_type_name','mb.branch_name')
         ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
         ->leftjoin('parameter_detail as bt','bt.id','=','booking.booking_type')
         ->leftjoin('product as p','p.product_id','=','booking.id_product')
         ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
         ->leftjoin('master_branch as mb','mb.id','=','booking.branch')
         ->orderBy('booking.id_booking','desc')
         ->paginate(10);
       }
       else {
         $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
         'booking.id_subsidi','booking.subsidi_value','booking.booking_type','bt.name as type_name',
         'cicilan_value','booking.booking_total','booking.booking_status','bg.fullname','p.product_name','s.subsidi_type_name','mb.branch_name')
         ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
         ->leftjoin('parameter_detail as bt','bt.id','=','booking.booking_type')
         ->leftjoin('product as p','p.product_id','=','booking.id_product')
         ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
         ->leftjoin('master_branch as mb','mb.id','=','booking.branch')
         ->orderBy('booking.id_booking','desc')
         ->where('booking.branch', $user->user_branch)
         ->paginate(10);
       }
      

      return view('content.booking.index',compact('booking'));
   }
   public function detail($id)
   {
      $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
      'booking.id_subsidi','booking.subsidi_value', 'booking.booking_type','booking.booking_type','bt.name as type_name',
      'cicilan_value','booking.booking_total','booking.booking_status','bg.fullname','bg.address', 'bg.ward','bg.districts','bg.city','bg.no_hp'
      ,'p.product_name','s.subsidi_type_name',
      'booking.created_at')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
      ->leftjoin('parameter_detail as bt','bt.id','=','booking.booking_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
      ->where('booking.id_booking',$id)
      ->first();
      return view('content.booking.detail.index',compact('booking'));
   }

   public function detailPrint($id)
   {
      $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
      'booking.id_subsidi','booking.subsidi_value', 'booking.booking_type','booking.booking_type','bt.name as type_name',
      'cicilan_value','booking.booking_total','booking.booking_status','bg.fullname','bg.address', 'bg.ward','bg.districts','bg.city','bg.no_hp'
      ,'p.product_name','s.subsidi_type_name',
      'booking.created_at')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
      ->leftjoin('parameter_detail as bt','bt.id','=','booking.booking_type')
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
      $booking_type = ParameterDetail::select('id','name')->where('status',1)->where('param_id',2)->get();
      $instansi = ParameterDetail::select('id','name')->where('status',1)->where('param_id',1)->get();
      $finco = ParameterDetail::select('id','name')->where('status',1)->where('param_id',3)->get();
      $marriage_status = ParameterDetail::select('id','name')->where('status',1)->where('param_id',4)->get();
      $home_status = ParameterDetail::select('id','name')->where('status',1)->where('param_id',5)->get();
      return view('content.booking.create',compact('product','subsidi','booking_type','instansi','finco','marriage_status','home_status'));
   }
   public function store(Request $request)
   {
		try {
            $booking_count = Booking::count();
            $booking_id = "BOOK-".date('ymdHis').rand(0, 100);
            $product = Product::select('product_id','product_price')->where('product_id',$request->id_product)->first();
            $user = User::select('user.id','user.user_branch')->where('user.id',auth()->user()->id)->first();
            $booking = Booking::create([
               'id_booking' => $booking_id,
               'id_product' => $request->id_product,
               'type_price_product' => $request->type_price_product,
               'price_product' => $request->price_product ?? 0,
               'sales_program' => $request->sales_program,
               'id_subsidi' => $request->id_subsidi,
               'subsidi_value' => $request->subsidi_value,
               'booking_type' => $request->booking_type,
               'cicilan_value' => $request->cicilan_value,
               'monthly_installment' => $request->monthly_installment,
               'finco' => $request->finco ?? 0,
               'finco_other' => $request->finco_other ?? " ",
               'booking_total' => $request->booking_total,
               'payment_status' => 0,
               'booking_status' => 0,
               'notes' => $request->notes,
               'branch' => $user->user_branch,
               'created_by' => auth()->user()->id
            ]);

            $image = $this->uploadImageBase64($request->image_ktp, $booking_id);
            $booking_guest = BookingGuest::create([
               'id_booking' => $booking->id_booking ?? NULL,
               'fullname' => $request->fullname ?? NULL,
               'id_number' => $request->id_number ?? NULL,
               'gender' => $request->gender,
               'placeofbirth' => $request->placeofbirth,
               'dateofbirth' => $request->dateofbirth,
               'address' => $request->address,
               'city' => $request->city,
               'rt' => $request->rt,
               'rw' => $request->rw,
               'districts' => $request->districts,
               'ward' => $request->ward,
               'postal_code' => $request->postal_code,
               'no_telp' => $request->no_telp,
               'no_hp' => $request->no_hp,
               'agency' => $request->agency,
               'npwp' => $request->npwp ?? NULL,
               'identity_file' => $image,
               'mother_name' => $request->mother_name,
               'marriage_status' => $request->marriage_status,
               'home_status' => $request->home_status,
               'year_long_stay' => $request->year_long_stay,
               'month_long_stay' => $request->month_long_stay,
               'dependents' => $request->dependents,
            ]);
            $mediator = Mediator::create([
               'id_booking' => $booking->id_booking,
               'mediator_name' => $request->mediator_name,
               'no_hp' => $request->no_hp_mediator,
               'amount_fee' => $request->amount_fee,
               'status' => 1
            ]);
            $booking_document_finance = BookingDocumentFinance::create([
                                    'id_booking' => $booking->id_booking,
                                    'owner_ktp' => $request->owner_ktp ?? 0,
                                    'applicants_ktp' => $request->applicants_ktp ?? 0,
                                    'guarantor_ktp' => $request->guarantor_ktp ?? 0,
                                    'electricity_bills' => $request->electricity_bills ?? 0,
                                    'engine_friction' => $request->engine_friction ?? 0,
                                    'checking_account' => $request->checking_account ?? 0,
                                    'salary_slip' => $request->salary_slip ?? 0,
                                    'sku' => $request->sku ?? 0,
                                    'npwp' => $request->npwp_doc ?? 0,
                                    'other' => $request->other ?? 0,
                                    'marriage_certificate' => $request->marriage_certificate ?? 0,
                                    'wife_ktp' => $request->wife_ktp ?? 0,
                                    'family_card' => $request->family_card ?? 0,
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
      $booking_type = ParameterDetail::select('id','name')->where('status',1)->where('param_id',2)->get();
      $instansi = ParameterDetail::select('id','name')->where('status',1)->where('param_id',1)->get();
      $finco = ParameterDetail::select('id','name')->where('status',1)->where('param_id',3)->get();
      $marriage_status = ParameterDetail::select('id','name')->where('status',1)->where('param_id',4)->get();
      $home_status = ParameterDetail::select('id','name')->where('status',1)->where('param_id',5)->get();
      $booking_document_finance = BookingDocumentFinance::where('id_booking',$id)->first();
      $mediator = Mediator::where('id_booking',$id)->first();
      return view('content.booking.edit',compact('product','subsidi','booking','booking_guest','booking_type','instansi','finco','marriage_status','home_status','booking_document_finance','mediator'));
   }

   public function update(Request $request, $id)
   {
		try {

         $booking = Booking::where('id_booking',$id)->first();
         $product = Product::select('product_id','product_price')->where('product_id',$request->id_product)->first();
         $booking->update([
            'id_product' => $request->id_product,
            'type_price_product' => $request->type_price_product,
            'price_product' => $request->price_product ?? 0,
            'sales_program' => $product->sales_program,
            'id_subsidi' => $request->id_subsidi,
            'subsidi_value' => $request->subsidi_value,
            'booking_type' => $request->booking_type,
            'cicilan_value' => $request->cicilan_value,
            'monthly_installment' => $request->monthly_installment,
            'finco' => $request->finco,
            'finco_other' => $request->finco_other ?? "",
            'booking_total' => $request->booking_total,
            'payment_status' => $request->payment_status,
            'booking_status' => $request->booking_status ?? 0,
            'notes' => $request->notes
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
            'fullname' => $request->fullname ?? NULL,
            'id_number' => $request->id_number ?? NULL,
            'gender' => $request->gender,
            'placeofbirth' => $request->placeofbirth,
            'dateofbirth' => $request->dateofbirth,
            'address' => $request->address,
            'city' => $request->city,
            'rt' => $request->rt,
            'rw' => $request->rw,
            'districts' => $request->districts,
            'ward' => $request->ward,
            'postal_code' => $request->postal_code,
            'no_telp' => $request->no_telp,
            'no_hp' => $request->no_hp,
            'agency' => $request->agency,
            'npwp' => $request->npwp ?? NULL,
            'identity_file' => $image,
            'mother_name' => $request->mother_name,
            'marriage_status' => $request->marriage_status,
            'home_status' => $request->home_status,
            'year_long_stay' => $request->year_long_stay,
            'month_long_stay' => $request->month_long_stay,
            'dependents' => $request->dependents,
         ]);
         $mediator = Mediator::where('id_booking',$id)->first();
         if(isset($mediator)){
            $mediator->update([
               'mediator_name' => $request->mediator_name,
               'no_hp' => $request->no_hp_mediator,
               'amount_fee' => $request->amount_fee
            ]);
         }
         else{
            $mediator = Mediator::create([
               'id_booking' => $booking->id_booking,
               'mediator_name' => $request->mediator_name,
               'no_hp' => $request->no_hp_mediator,
               'amount_fee' => $request->amount_fee,
               'status' => 1
            ]);
         }
         
         $booking_document_finance = BookingDocumentFinance::where('id_booking',$id)->first();
         if(isset($booking_document_finance)){
            $booking_document_finance->update([
               'owner_ktp' => $request->owner_ktp ?? 0,
               'applicants_ktp' => $request->applicants_ktp ?? 0,
               'guarantor_ktp' => $request->guarantor_ktp ?? 0,
               'electricity_bills' => $request->electricity_bills ?? 0,
               'engine_friction' => $request->engine_friction ?? 0,
               'checking_account' => $request->checking_account ?? 0,
               'salary_slip' => $request->salary_slip ?? 0,
               'sku' => $request->sku ?? 0,
               'npwp' => $request->npwp_doc ?? 0,
               'other' => $request->other ?? 0,
               'marriage_certificate' => $request->marriage_certificate ?? 0,
               'wife_ktp' => $request->wife_ktp ?? 0,
               'family_card' => $request->family_card ?? 0,
            ]);
         }
         else {
            $booking_document_finance = BookingDocumentFinance::create([
               'id_booking' => $$id,
               'owner_ktp' => $request->owner_ktp ?? 0,
               'applicants_ktp' => $request->applicants_ktp ?? 0,
               'guarantor_ktp' => $request->guarantor_ktp ?? 0,
               'electricity_bills' => $request->electricity_bills ?? 0,
               'engine_friction' => $request->engine_friction ?? 0,
               'checking_account' => $request->checking_account ?? 0,
               'salary_slip' => $request->salary_slip ?? 0,
               'sku' => $request->sku ?? 0,
               'npwp' => $request->npwp_doc ?? 0,
               'other' => $request->other ?? 0,
               'marriage_certificate' => $request->marriage_certificate ?? 0,
               'wife_ktp' => $request->wife_ktp ?? 0,
               'family_card' => $request->family_card ?? 0,
            ]);
         }
         

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

   public function spkPrint($id)
   {
      // $cabang = Cabang::select('id','branch_name','branch_address')->where('status',2)->get();
      
      $subsidi = Subsidi::select('id','subsidi_type_name')->where('status',1)->get();
      $booking = Booking::where('id_booking',$id)->first();
      $product = Product::select('product_id','product_name','product_type','product_colour','product_year')->where('product_id',$booking->id_product)->first();
      $booking_guest = BookingGuest::where('id_booking',$id)->first();
      $booking_type = ParameterDetail::select('id','name')->where('status',1)->where('param_id',2)->get();
      $instansi = ParameterDetail::select('id','name')->where('status',1)->where('param_id',1)->get();
      $finco = ParameterDetail::select('id','name')->where('status',1)->where('param_id',3)->get();
      $marriage_status = ParameterDetail::select('id','name')->where('status',1)->where('param_id',4)->get();
      $home_status = ParameterDetail::select('id','name')->where('status',1)->where('param_id',5)->get();
      $booking_document_finance = BookingDocumentFinance::where('id_booking',$id)->first();
      return view('content.booking.document.spk',compact('product','subsidi','booking','booking_guest','booking_type','instansi','finco','marriage_status','home_status','booking_document_finance'));
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
      $booking = BookingDocument::select('booking_document.*','bg.fullname','p.product_name','p.product_type','p.product_year','p.product_colour')
      ->leftjoin('booking as b','b.id_booking','=','booking_document.id_booking')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking_document.id_booking')
      ->leftjoin('product as p','p.product_id','=','b.id_product')
      ->where('booking_document.id_booking',$id)
      ->first();
      return view('content.booking.detail.travelDocumentPrint',compact('booking'));
   }
   public function documentStore(Request $request, $id)
   {
		try {
            $booking_document = BookingDocument::where('id_booking',$id)->first();
            $countBooking = Booking::count();
            $number = sprintf("%04d", $countBooking + 1)."/SJ/BJM/".date('/m/Y');
            if(isset($booking_document)){
               $booking_document->update([
                  'chassis_number' => $request->chassis_number,
                  'machine_number' => $request->machine_number,
                  'no_plat' => $request->no_plat,
                  'book_code' => $request->book_code,
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
                  'number' => $number,
                  'chassis_number' => $request->chassis_number,
                  'machine_number' => $request->machine_number,
                  'no_plat' => $request->no_plat,
                  'book_code' => $request->book_code,
                  'service_book' => $request->service_book ?? 0,
                  'guide_book' => $request->guide_book ?? 0,
                  'guidelines_book' => $request->guidelines_book ?? 0,
                  'tool_kit' => $request->tool_kit ?? 0,
                  'helmet' => $request->helmet ?? 0,
                  'jacket' => $request->jacket ?? 0,
                  'gift' => $request->gift ?? 0,
               ]);
            }

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

    public function getPriceProduct($product_id)
    {
        return Product::select('product_price')->where('product_id',$product_id)->first();;
    }

    public function getSubsidi($subsidi_id)
    {
        return Subsidi::select('subsidi_value')->where('id',$subsidi_id)->first();;
    }
    
}
