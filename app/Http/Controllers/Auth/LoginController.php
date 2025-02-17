<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role->name === 'SuperAdmin') {
                return redirect()->route('superadmin.dashboard');
            } elseif ($user->role->name === 'Admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('client.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Invalid Credentials']);
    }

    public function clientregister()
    {
        return view('auth.clientregister');
    }

    public function saveregister(Request $request)
    {
      $saveclient = DB::table('web_register')->insert([
        'name'          => $request->name,
        'phone'         => $request->phone,
        'email'         => $request->email,
        'api'           => $request->api,
        'domain'        => $request->domain,
        'domain_name'   => $request->domain_name,
        'website_name'  => $request->website_name,
      ]);

      return redirect('/')->with('success', 'Registeration Successfully ... !');
    }

    public function logout(Request $request)
{
    Auth::logout(); // Log out the user

    $request->session()->invalidate(); // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate CSRF token

    return redirect('/login'); // Redirect to login page
}
}

