<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Cabang;
use App\Models\Role;
use App\Models\User;

class UserController extends Controller
{
   public function index()
   {
      $user = User::select('user.id','user.first_name','user.last_name','user.email','user.status','b.branch_name','r.role_name')
      ->leftjoin('master_branch as b','b.id','=','user.user_branch')
      ->leftjoin('master_role as r','r.id','=','user.user_level')
      ->paginate(10);
      return view('content.user.index',compact('user'));
   }
   public function create()
   {
      $cabang = Cabang::where('status',1)->get();
      $role = Role::where('status',1)->get();
      return view('content.user.create',compact('cabang','role'));
   }
   public function store(Request $request)
   {
		try {
            User::create([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'email' => $request->email,
               'password' => Hash::make($request->password),
               'user_level' => $request->user_level,
               'user_branch' => $request->user_branch,
               'status' => 1
            ]);

            \Session::flash('success.message', 'Data berhasil ditambahkan');
            return redirect()->route('user.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal ditambahkan');
         return redirect()->route('user.index');
      }
   }
   public function edit($id)
   {
      $cabang = Cabang::where('status',1)->get();
      $role = Role::where('status',1)->get();
      $user = User::select('user.id','user.first_name','user.last_name','user.email','user.status','user.user_branch','user.user_level','b.branch_name','r.role_name')
      ->leftjoin('master_branch as b','b.id','=','user.user_branch')
      ->leftjoin('master_role as r','r.id','=','user.user_level')
      ->where('user.id',$id)
      ->first();
      return view('content.user.edit',compact('cabang','role','user'));
   }
   public function update(Request $request, $id)
   {
		try {

            $user = User::where('id',$id)->first();
            if(isset($request->password)){
               $password = Hash::make($request->password);
            }else{
               $password = $user->password;
            }
            $user->update([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'email' => $request->email,
               'password' => $password,
               'user_level' => $request->user_level,
               'user_branch' => $request->user_branch,
               'status' => $request->status
            ]);

            \Session::flash('success.message', 'Data berhasil diubah');
            return redirect()->route('user.index');

      } catch(\Exception $e) {
         \Session::flash('error.message', 'Data gagal diubah');
         return redirect()->route('user.index');
      }
   }
   public function delete($id)
	{
		$user = User::find($id);
      $user->delete();
      \Session::flash('success.message', 'Data berhasil dihapus');
      return redirect()->route('user.index');
	}
}
