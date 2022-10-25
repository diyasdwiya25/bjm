<?php

namespace App\Http\Controllers\mediator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Mediator;

class MediatorController extends Controller
{
   public function index()
   {
      $mediator = Mediator::select('id','id_booking','mediator_name','no_hp','amount_fee')
      ->paginate(10);
      return view('content.mediator.index',compact('mediator'));
   }
   public function create()
   {
      return view('content.mediator.create');
   }
   public function store(Request $request)
   {
		try {
            Mediator::create([
               'mediator_name' => $request->mediator_name,
               'no_hp' => $request->no_hp,
               'amount_fee' => $request->amount_fee,
               'id_number' => $request->id_number,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('mediator.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('mediator.index');
      }
   }
   public function edit($id)
   {
      $mediator = Mediator::select('id','mediator_name','no_hp','amount_fee')->where('id',$id)->first();
      return view('content.mediator.edit',compact('mediator'));
   }
   public function update(Request $request, $id)
   {
		try {
            $mediator = Mediator::where('id',$id)->first();
            $mediator->update([
               'mediator_name' => $request->mediator_name,
               'no_hp' => $request->no_hp,
               'amount_fee' => $request->amount_fee,
               'id_number' => $request->id_number,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('mediator.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('mediator.index');
      }
   }
   public function delete($id)
	{
		$mediator = Mediator::find($id);
      $mediator->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('mediator.index');
	}
}
