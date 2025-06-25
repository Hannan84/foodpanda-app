<?php
namespace App\Http\Controllers;

class LoginController extends Controller
{
 public function logout()
 {
  auth('web')->logout();
  return redirect('http://127.0.0.1:8000/');
 }
}
