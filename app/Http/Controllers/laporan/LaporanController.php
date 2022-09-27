<?php

namespace App\Http\Controllers\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class LaporanController extends Controller
{
  public function index()
  {
    $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
      'booking.id_subsidi','booking.subsidi_value','booking.booking_type','booking.payment_status','booking.created_at','bt.type_name',
      'cicilan_value','booking.booking_total','booking.booking_status','bg.title','bg.fullname','p.product_name','s.subsidi_type_name')
      ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
      ->leftjoin('booking_type as bt','bt.id','=','booking.booking_type')
      ->leftjoin('product as p','p.product_id','=','booking.id_product')
      ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
      ->paginate(10);
      return view('content.laporan.sale',compact('booking'));
  }
}
