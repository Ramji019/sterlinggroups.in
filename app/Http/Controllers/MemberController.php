<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
  public function Index()
  {
      $userid = Auth::user()->id;
      if(Auth::check()){
          $sql = "select count(*) as billcount from bill where bill_id = $userid";
          $bill = DB::select(DB::raw($sql));
          if (count($bill) > 0) {
              $billcount = $bill[0]->billcount;
          }
      }
      return view('client.dashboard',compact('billcount'));
  }


    public function addmember()
    {
        return view('members.addmember');
    }

    public function clients()
    {

        $client = DB::table('users')->where( 'role_id', 3 )->orderBy( 'id', 'Asc' )->get();

        return view('client.clients',compact('client'));
    }

    public function savemember(Request $request)
    {
      $saveclient = DB::table('users')->insert([
        'name'           => $request->name,
        'username'       => $request->username,
        'password'       => Hash::make($request->password),
        'cpassword'      => $request->password,
        'phone'          => $request->phone,
        'url'            => $request->url,
        'email'          => $request->email,
        'domain_renewal' => date( 'Y-m-d' ),
        'server_renewal' => date( 'Y-m-d' ),
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

      return redirect('/client/clients')->with('success', 'Client Add Successfully ... !');
    }

    public function updateretailer(Request $request)
    {
      $updateretailer = DB::table('users')->where( 'id', $request->retailerid )->update([
        'name'           => $request->name,
        'aadhaar_no'     => $request->aadhaar_no,
        'email'          => $request->email,
        'phone'          => $request->phone,
        'address'        => $request->address,
        'gender'         => $request->gender,
        'date_of_birth'  => $request->date_of_birth,
      ]);

      $profile = "";
      if ($request->profile != null) {
        $profile = $request->retailerid.'.'.$request->file('profile')->extension();
        $filepath = public_path('upload' . DIRECTORY_SEPARATOR . 'retailer' . DIRECTORY_SEPARATOR );
        move_uploaded_file($_FILES['profile']['tmp_name'], $filepath . $profile);
        $sql = "update users set profile='$profile' where id = $request->retailerid";
        DB::update(DB::raw($sql));
      }

      return redirect('/retailers')->with('success', 'retailer Updated Successfully ... !');
    }

    public function addbill($id)
    {
      $na = DB::table('users')->where('id',$id)->first();
        return view('bill.addbill',compact('id','na'));
    }

    public function savebill(Request $request)
    {
      $saveclient = DB::table('bill')->insert([
        'bill_id'         => $request->bill_id,
        'name'            => $request->username,
        'service_list'    => $request->service_list,
        'service_details' => $request->service_details,
        'amount'          => $request->amount,
        'paid_unpaid'     => $request->paid_unpaid,
        'status'          => 'Inactive'
      ]);

      return redirect('/bill/bills')->with('success', 'Bill Add Successfully ... !');
    }

    public function payamount(Request $request) {

        $request_id = $request->request_id;
        $utrno      = $request->utrno;

        $sql = "update bill set utrno = '$utrno' where id = $request_id";
        DB::update( DB::raw( $sql ) );

     return redirect( "/bill/bills" )->with( 'success', 'Utr No Update Successfully' );
    }
    public function updatepayment(Request $request) {
  //  dd($request->all());
        $paid_id      = $request->paid_id;
        $paid_unpaid  = $request->paid_unpaid;

        $sql = "update bill set paid_unpaid = '$paid_unpaid' where id = $paid_id";
        DB::update( DB::raw( $sql ) );

     return redirect( "/bill/bills" )->with( 'success', 'Payment Paid Successfully' );
    }

    public function dropretailer( $id ){

        $dropretailer = DB::table('users')->where( 'id', $id )->delete();
     return redirect()->back()->with('success', 'Retailer Deleted Successfully ... !');
    }


}
