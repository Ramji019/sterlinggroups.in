<?php

namespace App\Http\Controllers;

use App\Models\User; // assuming you are using the default User model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function Index()
    {
        $userid = Auth::user()->id;
        if(Auth::check()){
            $sql = "select count(*) as memcount from users where role_id = 3";
            $bill = DB::select(DB::raw($sql));
            if (count($bill) > 0) {
                $memcount = $bill[0]->memcount;
            }
        }
        return view('admin.dashboard',compact('memcount'));
    }
    public function SuperAdmin()
    {
        $userid = Auth::user()->id;
        if(Auth::check()){
            $sql = "select count(*) as admcount from users where role_id = 2";
            $bill = DB::select(DB::raw($sql));
            if (count($bill) > 0) {
                $admcount = $bill[0]->admcount;
            }
        }
        if(Auth::check()){
            $sql = "select count(*) as memscount from users where role_id = 3";
            $bill = DB::select(DB::raw($sql));
            if (count($bill) > 0) {
                $memscount = $bill[0]->memscount;
            }
        }
        return view('superadmin.dashboard',compact('admcount','memscount'));
    }

    public function addmember(Request $request)
    {

        return view('admin.addmember');

    }
    public function member(Request $request)
    {
        $mem = DB::table('users')->where('role_id', '=' , 3)->orderBy('id' ,'Asc')->get();
        return view('admin.member',compact('mem'));

    }

    public function savemember(Request $request)
    {
      $savemember = DB::table('users')->insert([
        'name'           => $request->name,
        'password'       => Hash::make($request->password),
        'cpassword'      => $request->password,
        'phone'          => $request->phone,
        'email'          => $request->email,
        'role_id'        => '3',
        'status'         => 'Inactive'
      ]);

      $insertid = DB::getPdo()->lastInsertId();

      $profile = "";
      if ($request->profile != null) {
        $profile = $insertid.'.'.$request->file('profile')->extension();
        $filepath = public_path('upload' . DIRECTORY_SEPARATOR . 'profile' . DIRECTORY_SEPARATOR);
        move_uploaded_file($_FILES['profile']['tmp_name'], $filepath . $profile);
      }
      $image = DB::table( 'users' )->where( 'id', $insertid )->update( [
        'profile'    => $profile,
      ] );

      return redirect('/admin/member')->with('success', 'Member Add Successfully ... !');
    }

}
