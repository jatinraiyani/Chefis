<?php

namespace App\Http\Controllers\Admin\Payment;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    public function index(){
        $data = Payment::get();
        $total = Payment::where('payment_status','success')->sum('amount');
        return view('Admin.Payment.index',compact('data','total'));
    }

    public function edit($id){
        $data = Payment::findorFail($id);
        return view('Admin.Payment.edit',compact('data'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'order_number'=>'required',
            'payment_type' =>'required',
            'amount'=>'required',
            'payment_id'=>'required',
            'payment_status'=>'required'
        ]);

        $data = $request->all();
        $data = $request->except('_token', '_method');

        $payment = Payment::where('id',$id)->update($data);
        if($payment){
            Session::flash('message', '<div class="alert alert-success"><strong>Success!</strong> Payment Updated Successfully.!! </div>');
            return redirect('admin/payment');
        }
    }

    public function destroy($id){
        $payment = Payment::where('id', $id)->delete();

        Session::flash('message', '<div class="alert alert-danger"><strong>Alert!</strong> Payment Deleted Successfully.!! </div>');

        return \redirect('admin/payment');
    }
}
