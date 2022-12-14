<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Exports\SaleLaporanExport;

class LaporanController extends Controller
{
  public function index()
  {
    $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
      'booking.id_subsidi','booking.subsidi_value','booking.booking_type','booking.payment_status','booking.created_at','bt.name as type_name',
      'cicilan_value','booking.booking_total','booking.booking_status','bg.fullname','p.product_name','s.subsidi_type_name','mb.branch_name','m.amount_fee')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
      ->leftjoin('parameter_detail as bt','bt.id','=','booking.booking_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
      ->leftjoin('master_branch as mb','mb.id','=','booking.branch')
      ->leftjoin('mediator as m','m.id_booking','=','booking.id_booking')
      ->paginate(10);
      return view('content.laporan.sale',compact('booking'));
  }

  public function exportExcel()
  {
      return (new SaleLaporanExport())->download('sale-laporan.xlsx');
  }
}
