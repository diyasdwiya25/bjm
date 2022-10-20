<?php

namespace App\Exports;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class SaleLaporanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function __construct() {
        
    }

    public function view(): View
    {
        $render = [];

        $booking = Booking::select('booking.id_booking','booking.id_product','booking.price_product',
                    'booking.id_subsidi','booking.subsidi_value','booking.booking_type','booking.payment_status','booking.created_at','bt.name as type_name',
                    'cicilan_value','booking.booking_total','booking.booking_status','bg.fullname','p.product_name','s.subsidi_type_name','mb.branch_name')
                    ->leftjoin('booking_guest as bg','bg.id_booking','=','booking.id_booking')
                    ->leftjoin('parameter_detail as bt','bt.id','=','booking.booking_type')
                    ->leftjoin('product as p','p.product_id','=','booking.id_product')
                    ->leftjoin('master_subsidi_type as s','s.id','=','booking.id_subsidi')
                    ->leftjoin('master_branch as mb','mb.id','=','booking.branch')
                    ->get();
        return view('export.sale', [
            'booking' => $booking,
        ]);
    }
}
