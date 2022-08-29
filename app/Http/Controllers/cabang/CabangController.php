<?php

namespace App\Http\Controllers\cabang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Cabang;

class CabangController extends Controller
{
   public function index()
   {
      $cabang = Cabang::select('id','branch_name','branch_address','status')
      ->paginate(10);
      return view('content.cabang.index',compact('cabang'));
   }
   public function create()
   {
      return view('content.cabang.create');
   }
   public function store(Request $request)
   {
		try {
            Cabang::create([
               'branch_name' => $request->branch_name,
               'branch_address' => $request->branch_address,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('cabang.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('cabang.index');
      }
   }
   public function edit($id)
   {
      $cabang = Cabang::select('id','branch_name','branch_address','status')->where('id',$id)->first();
      return view('content.cabang.edit',compact('cabang'));
   }
   public function update(Request $request, $id)
   {
		try {
            $cabang = Cabang::where('id',$id)->first();
            $cabang->update([
               'branch_name' => $request->branch_name,
               'branch_address' => $request->branch_address,
               'status' => $request->status
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('cabang.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('cabang.index');
      }
   }
   public function delete($id)
	{
		$cabang = Cabang::find($id);
      $cabang->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('cabang.index');
	}
}
