<?php

namespace App\Http\Controllers\submission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SubmissionBpkb;
use App\Models\Booking;

class SubmissionBpkbController extends Controller
{
   public function index()
   {
      $bpkb = SubmissionBpkb::select('submission_bpkb.id','p.product_name','p.product_type','no_plat','name','filed_date','finish_date','handed_over_leasing_date','handed_over_date','handed_over_by','received_by')
      ->leftjoin('booking as b','b.id_booking','=','submission_bpkb.id_booking')
      ->leftjoin('product as p','p.product_id','=','b.id_product')
      ->paginate(10);
      return view('content.submission.bpkb.index',compact('bpkb'));
   }
   public function create()
   {
      $booking = Booking::select('booking.id_booking','p.product_name','p.product_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->where('booking.booking_status',1)
      ->get();
      return view('content.submission.bpkb.create',compact('booking'));
   }
   public function store(Request $request)
   {
		try {
            SubmissionBpkb::create([
               'id_booking' => $request->branch_name,
               'no_plat' => $request->no_plat,
               'name' => $request->name,
               'filed_date' => $request->filed_date,
               'finish_date' => $request->finish_date,
               'handed_over_leasing_date' => $request->handed_over_leasing_date,
               'handed_over_date' => $request->handed_over_date,
               'handed_over_by' => $request->handed_over_by,
               'received_by' => $request->received_by
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('submission.bpkb.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('submission.bpkb.index');
      }
   }
   public function edit($id)
   {
      $booking = Booking::select('booking.id_booking','p.product_name','p.product_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->where('booking.booking_status',1)
      ->get();
      $bpkb = SubmissionBpkb::select('submission_stnk.id','id_booking','no_plat','name','filed_date','finish_date','handed_over_date','handed_over_leasing_date','handed_over_by','received_by')->where('id',$id)->first();
      return view('content.submission.bpkb.edit',compact('bpkb','booking'));
   }
   public function update(Request $request, $id)
   {
		try {
            $bpkb = SubmissionBpkb::where('id',$id)->first();
            $bpkb->update([
               'id_booking' => $request->branch_name,
               'no_plat' => $request->no_plat,
               'name' => $request->name,
               'filed_date' => $request->filed_date,
               'finish_date' => $request->finish_date,
               'handed_over_leasing_date' => $request->handed_over_leasing_date,
               'handed_over_date' => $request->handed_over_date,
               'handed_over_by' => $request->handed_over_by,
               'received_by' => $request->received_by
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('submission.bpkb.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('submission.bpkb.index');
      }
   }
   public function delete($id)
	{
	   $bpkb = SubmissionBpkb::find($id);
      $bpkb->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('submission.bpkb.index');
	}
}
