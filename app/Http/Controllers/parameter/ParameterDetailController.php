<?php

namespace App\Http\Controllers\parameter;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Parameter;
use App\Models\ParameterDetail;

class ParameterDetailController extends Controller
{
   public function index()
   {
      $parameterDetail = ParameterDetail::select('parameter_detail.id','parameter_detail.param_id','parameter_detail.name', 'parameter.name as name_param',
      'parameter_detail.description','parameter_detail.status')
      ->leftjoin('parameter','parameter.id','=','parameter_detail.param_id')
      ->paginate(10);
      return view('content.parameter-detail.index',compact('parameterDetail'));
   }
   public function create()
   {
        $parameter = Parameter::select('id','name','description','status')->get();
        return view('content.parameter-detail.create',compact('parameter'));
   }
   public function store(Request $request)
   {
		try {
            ParameterDetail::create([
               'name' => $request->name,
               'description' => $request->description,
               'param_id' => $request->param_id,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('parameter.detail.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('parameter.detail.index');
      }
   }
   public function edit($id)
   {
      $parameter = Parameter::select('id','name','description','status')->get();
      $parameterDetail = ParameterDetail::select('id','name','description','status')->where('id',$id)->first();
      return view('content.parameter-detail.edit',compact('parameterDetail','parameter'));
   }
   public function update(Request $request, $id)
   {
		try {
            $parameterDetail = ParameterDetail::where('id',$id)->first();
            $parameterDetail->update([
               'name' => $request->name,
               'description' => $request->description,
               'param_id' => $request->param_id,
               'status' => $request->status
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('parameter.detail.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('parameter.detail.index');
      }
   }
   public function delete($id)
	{
		$parameterDetail = ParameterDetail::find($id);
      $parameterDetail->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('parameter.detail.index');
	}
}
