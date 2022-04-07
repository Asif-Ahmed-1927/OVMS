<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\User;
use App\WorkRequest;

class PaymentController extends Controller
{
    public function showPayment(Request $request, $id)
    {
        $workRequest = WorkRequest::where('id', $id)
            // ->orWhere('user_id', $request->session()->get('userid'))
            // ->orWhere('volunteer_id', $request->session()->get('userid'))
            ->first();

        $paymentBudgetArray = [
            "Heavy-Weight-Groceries" => 1500,
            "Heavy-Weight-Delivering-Parcel" => 2500,
            "Heavy-Weight-Collecting-Parcel" => 2500,
            "Heavy-Weight-Collecting-Others" => 2500,
            "Moderate-Weight-Groceries" => 2500,
            "Moderate-Weight-Delivering-Parcel" => 2500,
            "Moderate-Weight-Collecting-Parcel" => 2500,
            "Moderate-Weight-Collecting-Others" => 2500,
            "Lite-Weight-Groceries" => 2500,
            "Lite-Weight-Delivering-Parcel" => 2500,
            "Lite-Weight-Collecting-Parcel" => 2500,
            "Lite-Weight-Collecting-Medical-Supplement" => 2500,
            "Lite-Weight-Collecting-Others" => 2500,
        ];



        $workRequest->details = explode(">", $workRequest->details)[3];
        $workRequest->details = explode("<", $workRequest->details)[0];
        $workRequest->details = explode(" ", $workRequest->details)[2];

        $paymentAmount = $paymentBudgetArray[$workRequest->details];

        return view('payment.payment')->with('details', $workRequest)->with('amount', $paymentAmount);
    }
    public function paymentstatus(Request $request)
    {
        $workRequest = WorkRequest::where('status', "completed")
            ->where('user_id', $request->session()->get('userid'))
            ->get();



        foreach ($workRequest as $key => $value) {
            $payment = Payment::where('work_id', $value->id)->first();
            if ($payment) {
                unset($workRequest[$key]);
            } else {
            }
        }


        // $workRequest = WorkRequest::all();

        //dd($workRequest);
        return view('user.paymentStatus')->with('list', $workRequest);
    }

    public function paymentStore(Request $request, $id)
    {
        $workRequest = WorkRequest::where('id', $id)
            // ->orWhere('user_id', $request->session()->get('userid'))
            // ->orWhere('volunteer_id', $request->session()->get('userid'))
            ->first();
        if ($workRequest) {

            $user = User::find($id);

            $payment = new Payment;
            $payment->work_id = $id;
            $payment->u_id = $workRequest->user_id;
            $payment->v_id = $workRequest->volunteer_id;
            $payment->payment_type = $request->payment_type;
            if ($payment->payment_type == "cash_payment") {

                $payment->card_name = "empty";
                $payment->card_number = "empty";
                $payment->expire = "empty";
                $payment->cvv = "empty";
                $payment->status = "Done";
                $payment->price = $request->amount;
            } else {
                $payment->card_name = $request->card_name;
                $payment->card_number = $request->card_number;
                $payment->expire = $request->expire;
                $payment->cvv = $request->cvv;
                $payment->status = "Done";
                $payment->price = $request->amount;
            }

            $payment->save();

            return redirect()->route('review')->with('id', $id)->with('user', $user)->with('payment', $payment);
        } else {
            return back();
        }

        return back();
    }
}
