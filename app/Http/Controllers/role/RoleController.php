<?php

namespace App\Http\Controllers\role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;

class RoleController extends Controller
{
   public function index()
   {
      $role = Role::select('id','role_name','status')
      ->paginate(10);
      return view('content.role.index',compact('role'));
   }
   public function create()
   {
      return view('content.role.create');
   }
   public function store(Request $request)
   {
		try {
            Role::create([
               'role_name' => $request->role_name,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('role.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('role.index');
      }
   }
   public function edit($id)
   {
      $role = Role::select('id','role_name','status')->where('id',$id)->first();
      return view('content.role.edit',compact('role'));
   }
   public function update(Request $request, $id)
   {
		try {
            $role = Role::where('id',$id)->first();
            $role->update([
               'role_name' => $request->role_name,
               'status' => $request->status
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('role.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('role.index');
      }
   }
   public function delete($id)
	{
		$role = Role::find($id);
      $role->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('role.index');
	}
}
