<?php

namespace App\Http\Controllers\submission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\SubmissionStnk;
use App\Models\Booking;

class SubmissionStnkController extends Controller
{
   public function index()
   {
      $stnk = SubmissionStnk::select('submission_stnk.id','p.product_name','p.product_type','no_plat','name','filed_date','finish_date','handed_over_date','handed_over_by','received_by')
      ->leftjoin('booking as b','b.id_booking','=','submission_stnk.id_booking')
      ->leftjoin('product as p','p.product_id','=','b.id_product')
      ->paginate(10);
      return view('content.submission.stnk.index',compact('stnk'));
   }
   public function create()
   {
      $booking = Booking::select('booking.id_booking','p.product_name','p.product_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->where('booking.booking_status',1)
      ->get();
      return view('content.submission.stnk.create',compact('booking'));
   }
   public function store(Request $request)
   {
		try {
            SubmissionStnk::create([
               'id_booking' => $request->branch_name,
               'no_plat' => $request->no_plat,
               'name' => $request->name,
               'filed_date' => $request->filed_date,
               'finish_date' => $request->finish_date,
               'handed_over_date' => $request->handed_over_date,
               'handed_over_by' => $request->handed_over_by,
               'received_by' => $request->received_by
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('submission.stnk.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('submission.stnk.index');
      }
   }
   public function edit($id)
   {
      $booking = Booking::select('booking.id_booking','p.product_name','p.product_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->where('booking.booking_status',1)
      ->get();
      $stnk = SubmissionStnk::select('submission_stnk.id','id_booking','no_plat','name','filed_date','finish_date','handed_over_date','handed_over_by','received_by')->where('id',$id)->first();
      return view('content.submission.stnk.edit',compact('stnk','booking'));
   }
   public function update(Request $request, $id)
   {
		try {
            $stnk = SubmissionStnk::where('id',$id)->first();
            $stnk->update([
               'id_booking' => $request->branch_name,
               'no_plat' => $request->no_plat,
               'name' => $request->name,
               'filed_date' => $request->filed_date,
               'finish_date' => $request->finish_date,
               'handed_over_date' => $request->handed_over_date,
               'handed_over_by' => $request->handed_over_by,
               'received_by' => $request->received_by
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('submission.stnk.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('submission.stnk.index');
      }
   }
   public function delete($id)
	{
		$stnk = SubmissionStnk::find($id);
      $stnk->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('submission.stnk.index');
	}
}
