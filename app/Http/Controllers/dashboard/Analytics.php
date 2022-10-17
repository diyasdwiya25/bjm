<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking; 
use App\Models\Product;
use Carbon\Carbon;

class Analytics extends Controller
{
  public function index()
  {
    $now = Carbon::now();
    $product = Product::where('status',1)->count();
    $sales = Booking::where('booking_status',1)->count();
    $payment = Booking::where('booking_status',1)->where('payment_status',1)->sum('booking_total');
    $transaction = Booking::where('booking_status',1)->where('payment_status',1)->sum('price_product');
    $new_transaction = Booking::select('booking.id_booking','p.product_name','booking.price_product')
    ->leftjoin('product as p','p.product_id','=','booking.id_product')
    ->where('booking_status',1)
    ->where('payment_status',1)
    ->get();

    $month = $now->format('m');
    $year_now = $now->format('Y');
    $year_old = $now->format('Y') - 1;

    for($i=1;$i<=12;$i++){
      $salesYearNow[] = Booking::where('booking_status',1)
      ->whereMonth('created_at', '=', $i)
      ->whereYear('created_at', '=', $year_now)
      ->count();

      $salesYearOld[] = Booking::where('booking_status',1)
      ->whereMonth('created_at', '=', $i)
      ->whereYear('created_at', '=', $year_old)
      ->count();
    }
    
    $datasets = array(
      "year_now" => $year_now,
      "year_old" => $year_old,
      "salesYearNow" => $salesYearNow,
      "salesYearOld" => $salesYearOld
  );

    return view('content.dashboard.dashboards-analytics',compact('product','sales','payment','transaction','new_transaction','datasets'));
  }
}
