<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeePayment;
use App\Models\User;

class FeePaymentController extends Controller
{
    //

    public function feePayments(){
        $users=User::with(['course'])->where('is_trainee','Yes')->get();
        $feepayments=FeePayment::all();
        return view('admin.feepayments.showFeePayments',compact(['feepayments','users']));
    }

    public function addFeePayments(Request $request){
        $add=FeePayment::create($request->all());
        if($add){
            return redirect()->back()->with('succes','Fee Payment Added succesfully');
        }else{
            return redirect()->back()->with('error','Failed');
        }
    }
}
