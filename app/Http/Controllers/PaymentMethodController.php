<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function listMethod()
    {   
        $methods = PaymentMethod::all();

        return view('method.list-method', [
            'methods' => $methods
        ]);
    }

    public function createMethod(Request $request)
    {
        $validator = validator(
            request()->all(),
            [
                'name' => "required",
            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }
        $payment_method = new PaymentMethod();
        $payment_method->name = request()->name;
        $payment_method->account_number = request()->account_number;
        $payment_method->status = request()->status;
        $payment_method->remark = request()->remark;
        if($request->hasfile('qr_photo'))
        {
            $file = $request->file('qr_photo');
            $name = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $file->move('images/payment_method/',$name);
            $payment_method->qr_photo=$name;
        }
        else
        {
            $payment_method->qr_photo = '';
        }
        $payment_method->save();
        return back()->with('info_success', 'New Payment Method added Successfully!');
    }

    public function deleteMethod() 
    {
        $id = request()->id;
        PaymentMethod::find($id)->delete();

        return back()->with('info_danger', "Payment Method Deleted successfully!");
    }

    public function updMethod()
    {
        $id = request()->id;
        $payment_method = PaymentMethod::find($id);
        return view('method.upd-method', [
            'method' => $payment_method,
        ]);
    }

    public function updateMethod(Request $request) 
    {
        $validator = validator(
            request()->all(),
            [
                'name' => "required",

            ]
        );
        if ($validator->fails()) {
            return back()->with('info_danger', "Please Enter the Data!");
        }
        $payment_method = PaymentMethod::find(request()->id);

        $payment_method->name = request()->name;
        $payment_method->account_number = request()->account_number;
        $payment_method->status = request()->status;
        $payment_method->remark = request()->remark;
        if($request->hasfile('qr_photo'))
            {
                $file        = $request->file('qr_photo');
                $name        = $file->getClientOriginalName();
                $extension   = $file->getClientOriginalExtension();
                $file->move('images/payment_method',$name);
                $payment_method->qr_photo = $name;

            }
        $payment_method->save();
        return redirect('/admin/method/list')->with('info_success','Payment Method Updated Successfully');
    }
}
