<?php

namespace App\Http\Controllers\parameter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Parameter;

class ParameterController extends Controller
{
   public function index()
   {
      $parameter = Parameter::select('id','name','description','status')
      ->paginate(10);
      return view('content.parameter.index',compact('parameter'));
   }
   public function create()
   {
      return view('content.parameter.create');
   }
   public function store(Request $request)
   {
		try {
            Parameter::create([
               'name' => $request->name,
               'description' => $request->description,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('parameter.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('parameter.index');
      }
   }
   public function edit($id)
   {
      $parameter = Parameter::select('id','name','description','status')->where('id',$id)->first();
      return view('content.parameter.edit',compact('parameter'));
   }
   public function update(Request $request, $id)
   {
		try {
            $parameter = Parameter::where('id',$id)->first();
            $parameter->update([
               'name' => $request->name,
               'description' => $request->description,
               'status' => $request->status
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('parameter.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('parameter.index');
      }
   }
   public function delete($id)
	{
		$parameter = Parameter::find($id);
      $parameter->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('parameter.index');
	}
}
