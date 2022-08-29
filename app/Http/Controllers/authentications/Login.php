<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Login extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login');
  }

  public function login(Request $request)
  {
      // cek form validation
      $this->validate($request, [
          'email' => 'required|email',
          'password' => 'required'
      ]);
      // cek apakah email dan password benar
      if (auth()->attempt(request(['email', 'password']))) {
          return redirect()->route('dashboard-analytics');
      }

      // jika salah, kembali ke halaman login
      return redirect()->back()->with('error', 'Email atau Password salah');
  }

  public function logout()
  {
      auth()->logout();
      return redirect()->route('auth-login');
  }
}
