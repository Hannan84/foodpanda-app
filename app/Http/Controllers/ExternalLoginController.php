<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ExternalLoginController extends Controller
{
 public function handle(Request $request)
 {
  $token = $request->query('token');

  if (! $token) {
   return redirect('/login')->withErrors(['Token is missing']);
  } else {
   try {
    $payload = JWTAuth::setToken($token)->getPayload();
    $user    = User::find($payload['sub']);
    if (! $user) {
     return redirect('/login')->withErrors(['User not found']);
    }

    auth()->login($user);
    return redirect('/dashboard');
   } catch (\Exception $e) {
    return redirect('/login')->withErrors(['Invalid or expired token']);
   }
  }
 }
}
