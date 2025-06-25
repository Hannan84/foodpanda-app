<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
 public function showLoginForm()
 {
  return view('login');
 }
 public function logout()
 {
  auth('web')->logout();
  auth('api')->logout();
  $redirect = request()->query('redirect', '/login');
  return redirect($redirect);
 }
}
