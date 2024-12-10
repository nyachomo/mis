<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeePayment;
use App\Models\User;
use App\Models\Course;
use App\Models\Clas;
use Illuminate\Support\Facades\Auth;

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

    public function traineeViewFeePayments(){
        if(Auth::check()&& Auth::user()->is_trainee=='Yes'){
            $student=User::with(['course','clas'])->where('id',Auth::user()->id)->first();
            $payments=FeePayment::where('user_id',Auth::user()->id)->get();
            $credit=FeePayment::where('user_id',Auth::user()->id)->sum('amount_paid');
            $debit=$student->course->course_price;
            $balance=$debit-$credit;

           
            return view('admin.feepayments.traineeViewFeePayments',compact('payments','student','balance','credit','debit'));
        }
    }

    public function adminViewStudentFeePayment($user_id){
       if(Auth::check() && Auth::user()->is_admin=='Yes'){
            $student=User::with(['course','clas'])->where('id',$user_id)->first();
            $credit=FeePayment::where('user_id',$user_id)->sum('amount_paid');
            $debit=$student->course->course_price;
            $balance=$debit-$credit;
            $fees=FeePayment::select('amount_paid','payment_method','payment_method','payment_ref_no','date_paid','id')
             ->where('user_id',$user_id)->paginate(10);
             return view('admin.feepayments.adminViewStudentFeePayment',compact('fees','student','balance','credit','debit'));
       }
    }

    public function adminDeeleteStudentFeePayment(Request $request){
        $delete=FeePayment::where('id',$request->id)->delete();
        if($delete){
            return redirect()->back()->with('success','Fee Payment Deleted succesfully');
        }else{
            return redirect()->back()->with('error','Failed. Could not delete');
        }
    }
}
