<?php

namespace App\Http\Controllers\subsidi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Subsidi;

class SubsidiController extends Controller
{
   public function index()
   {
      $subsidi = Subsidi::select('id','subsidi_type_name','subsidi_value','status')
      ->paginate(10);
      return view('content.subsidi.index',compact('subsidi'));
   }
   public function create()
   {
      return view('content.subsidi.create');
   }
   public function store(Request $request)
   {
		try {
            Subsidi::create([
               'subsidi_type_name' => $request->subsidi_type_name,
               'subsidi_value' => $request->subsidi_value,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('subsidi.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('subsidi.index');
      }
   }
   public function edit($id)
   {
      $subsidi = Subsidi::select('id','subsidi_type_name','subsidi_value','status')->where('id',$id)->first();
      return view('content.subsidi.edit',compact('subsidi'));
   }
   public function update(Request $request, $id)
   {
		try {
            $subsidi = Subsidi::where('id',$id)->first();
            $subsidi->update([
               'subsidi_type_name' => $request->subsidi_type_name,
               'subsidi_value' => $request->subsidi_value,
               'status' => $request->status
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('subsidi.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('subsidi.index');
      }
   }
   public function delete($id)
	{
		$subsidi = Subsidi::find($id);
      $subsidi->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('subsidi.index');
	}
}
