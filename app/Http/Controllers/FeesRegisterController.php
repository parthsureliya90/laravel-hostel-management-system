<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\FeesRegister;
use App\Models\Students;
use Illuminate\Http\Request;
use Auth;

class FeesRegisterController extends Controller
{
    public function fees_pay($id, $type = null)
    {
        if (empty($id)) {
            return route('students');
        }

        $name = Students::where('id', $id)->select('fname', 'mname', 'lname', 'payable_fees', 'fees_duration', 'batch_id')->get();
        $title = $name[0]->fname . " " . $name[0]->mname . " " . $name[0]->lname;
        $payable_fees = $name[0]->payable_fees;
        $fees_duration = $name[0]->fees_duration;
        $batch_id = $name[0]->batch_id;
        $type = empty($type) ? "INSTALLMENT" :  $type;

        $remaining_amount = Fees::where('sid', $id)->select('remaining_amount')->get();

        $paid_fees_amount = FeesRegister::where('sid', $id)->sum('amount');

        $remaining_amount = $remaining_amount[0]->remaining_amount ?? 00;


        $recipet_no = FeesRegister::max('recipet_no');

        $fees_register = FeesRegister::where('sid', $id)->orderBy('fees_type', 'DESC')->get();

        return view('fees.fees_pay', [
            "fees_register" => $fees_register,
            "title" => $title,
            "type" => $type,
            "remaining_amount" => number_format($remaining_amount, 2),
            "paid_fees_amount" => number_format($paid_fees_amount, 2),
            'payable_fees' => $remaining_amount,
            'total_fees_to_be_paid' => number_format($payable_fees, 2),
            'sid' => $id,
            'batch_id' => $batch_id,
            'recipet_no' => $recipet_no + 1,
            'fees_duration' => $fees_duration
        ]);
    }

    public function save_fees_pay(Request $request)
    {


        $request->validate([
            'sid' => 'required',
            'fees_type' => 'required|string',
            'payable_fees' => 'required',
            'paying_amount' => 'required|numeric',
            'recipet_no' => 'required|numeric',
            'paid_date' => 'required',
            'firm' => 'required',
        ]);




        $recipet_no = $request->input("recipet_no");
        $sid = $request->input("sid");
        $batch_id = $request->input("batch_id");
        $fees_type = $request->input("fees_type");
        $payable_fees = $request->input("payable_fees");
        $amount = $request->input("paying_amount");
        $verified_with_bank = $request->input("verified_with_bank");
        $is_fees_completed = $request->input("full_fees_paid");
        $remarks = $request->input("remarks");
        $firm = $request->input("firm");
        $paid_date = date("Y-m-d", strtotime($request->input("paid_date")));

        // print_r($request->input());

        // exit;

        if ($payable_fees < $amount) {
            return back()->with('warning', 'Paying Amount can not be greater than Payble Fees. The Paying Amount must be less than ' . number_format($payable_fees, 2));
        }


        $added_by = Auth::user()->username;

        $remaining_amount = $payable_fees - $amount;


        $fees_register = new FeesRegister();
        $fees_register->recipet_no = $recipet_no;
        $fees_register->sid = $sid;
        $fees_register->batch_id = $batch_id;
        $fees_register->amount = $amount;
        $fees_register->paid_date = $paid_date;
        $fees_register->verified_with_bank = $verified_with_bank;
        $fees_register->fees_type = $fees_type;
        $fees_register->remarks = $remarks;
        $fees_register->added_by = $added_by;

        $fees_register->firm = $firm;


        if ($fees_register->save()) {
            $update = Fees::where('sid', $sid)
                ->update(['remaining_amount' => $remaining_amount]);

            if ($is_fees_completed == "YES") {
                $update_student = Students::where('id', $sid)->update(['is_fees_completed', 'YES']);
            }

            return back()->with('success', ' ₹ ' . number_format($amount, 2) . ' Fees Paid. Remaining Fees.:  ₹ ' . number_format($remaining_amount, 2));
        } else {
            return back()->with('warning', 'Try Again !');
        }
    }
    public function bank_verified($id, $type)
    {
        if (empty($id)) {
            return back()->with('warning', 'Try Again !');
        }
        if (empty($type)) {
            return back()->with('warning', 'Try Again !');
        }

        $update = FeesRegister::find($id);
        $update->verified_with_bank = $type;

        if ($update->save()) {
            return back()->with('success', 'Selected Fee is Verified with Bank');
        } else {
            return back()->with('error', 'Selected Fee is Unverified with Bank');
        }
    }
    public function remove_fees($id, $sid)
    {
        if (empty($id)) {
            return back()->with('warning', 'Try Again !');
        }
        if (empty($sid)) {
            return back()->with('warning', 'Try Again !');
        }


        $feesdata = FeesRegister::where('id', $id)
            ->where('sid', $sid)
            ->select('amount')
            ->get();

        $curernt_fees_amount = $feesdata[0]->amount;

        $removefees = FeesRegister::destroy($id);
        if ($removefees) {
            $update_remaining_fees = Fees::increment('remaining_amount', $curernt_fees_amount);
            $update_student = Students::find($sid);
            $update_student->is_fees_completed = "NO";
            $update_student->save();
            return back()->with('success', 'Selected Fee is Removed');
        } else {
            return back()->with('warning', 'Try Again !');
        }
    }
}
