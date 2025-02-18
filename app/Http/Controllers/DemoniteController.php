<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DemoniteController extends Controller
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

  public function adddemo(){
    $demo = DB::table('demonite')->orderBy( 'id' , 'Asc' )->get();
    $demo = json_decode( json_encode( $demo ), true );
    foreach ( $demo as $key => $service ) {
      $demo[ $key ][ 'payment' ] = array();
      $service_id = $service[ 'id' ];

      $payment = DB::table('demo_payment')->where('service_id',$service_id)->get();
      if(count($payment) > 0){
        $demo[ $key ][ 'payment' ] = $payment;
      }
    }
    $demo = json_decode( json_encode( $demo ));
    return view('Demo.adddemo',compact('demo'));
  }

  // public function adddemo(Request $request){
  //   $parent_id = $request->parent_id;
  //   DB::table('find_payment')->where('parent_id',$parent_id )->delete();
  //   if($request->has('parent_id')){
  //     foreach ( $request->parent_id as $key => $payment ) {
  //       $service_id = $request->service_id[ $key ];
  //       $distributor_amount = $request->distributor_amount[ $key ];
  //       $retailer_amount = $request->retailer_amount[ $key ];
  //       $customer_amount = $request->customer_amount[ $key ];

  //         DB::table( 'find_payment' )->insert( [
  //           'parent_id'            => $payment,
  //           'service_id'           => $service_id,
  //           'distributor_amount'   => $distributor_amount,
  //           'retailer_amount'      => $retailer_amount,
  //           'customer_amount'      => $customer_amount,
  //         ] );
  //     }
  //   }
  //   return redirect('Demo.adddemo')->with('success' ,"Payment Updated Succesfully !");
  // }

    // public function adddemo()
    // {
    //     return view('Demo.adddemo');
    // }

    public function demonitain()
    {

        $demo = DB::table('demonite')->orderBy( 'id', 'Asc' )->get();

        return view('Demo.demonitain',compact('demo'));
    }

    public function savedemo(Request $request)
    {
      $savedemo = DB::table('demonite')->insert([
        'name'       => $request->name,
      ]);

      return redirect('/Demo/demonitain')->with('success', 'Demonitain Add Successfully ... !');
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
