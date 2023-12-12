<?php

namespace App\Http\Controllers;

use App\Models\FeesRegister;
use App\Models\Students;
use App\Models\Fees;
use Illuminate\Http\Request;

class FeesReportController extends Controller
{
    public function fees_report($date_from = null, $date_to = null)
    {

        // $student = Students::find($sid)->select('fname', 'mname', 'lname', 'cource', 'year', 'fees_duration')->get();
        $feedata = null;


        $date_from = (empty($_REQUEST["date_from"])) ? null : $_REQUEST["date_from"];
        $date_to = (empty($_REQUEST["date_to"])) ? null : $_REQUEST["date_to"];


        $data = FeesRegister::whereBetween('paid_date', [$date_from, $date_to])
            ->leftJoin('students as s', 's.id', 'fees_register.sid')
            ->select('fees_register.*', 's.fname', 's.mname', 's.lname')
            ->get();

        $totalfees = FeesRegister::whereBetween('paid_date', [$date_from, $date_to])->sum('amount');
        $totalfees_aradhana = FeesRegister::whereBetween('paid_date', [$date_from, $date_to])->where('firm', 'ARADHANA')->sum('amount');
        $totalfees_gandhidham = FeesRegister::whereBetween('paid_date', [$date_from, $date_to])->where('firm', 'GANDHIDHAM')->sum('amount');
        $totalfees_bank_verified = FeesRegister::whereBetween('paid_date', [$date_from, $date_to])->where('verified_with_bank', 'NO')->sum('amount');
        $totalfees_bank_verified_YES = FeesRegister::whereBetween('paid_date', [$date_from, $date_to])->where('verified_with_bank', 'YES')->sum('amount');



        $title = "Fees Date Wise Reports";
        if (!empty($date_from) && !empty($date_to)) {
            $title = "Fees Reports From Date.: " . date('d-m-Y', strtotime($date_from)) . " To Date.: " . date('d-m-Y', strtotime($date_to));
        } else {
            $title = "Fees Date Wise Reports";
            $date_from =   null;
            $date_to =  null;
        }
        return view('fees.fees_report', [
            "feesdata" => $data,
            "totalfees" => number_format($totalfees, 2),
            "totalfees_aradhana" => number_format($totalfees_aradhana, 2),
            "totalfees_bank_verified" => number_format($totalfees_bank_verified, 2),
            "totalfees_bank_verified_YES" => number_format($totalfees_bank_verified_YES, 2),
            "totalfees_gandhidham" => number_format($totalfees_gandhidham, 2),
            "date_from" => date('d-m-Y', strtotime($date_from)),
            "date_to" => date('d-m-Y', strtotime($date_to)),
            "title" => $title,
        ]);
    }
    public function fees_register_by_student($sid)
    {

        // $student = Students::find($sid)->select('fname', 'mname', 'lname', 'cource', 'year', 'fees_duration')->get();
        $feedata = null;




        $data = FeesRegister::where('sid', $sid)
            ->get();

        $studentdata = Students::where('id', $sid)->select('payable_fees', 'fees_duration', 'fname', 'mname', 'lname')->get();
        $remaining_amount = Fees::where('sid', $sid)->select('remaining_amount')->get();
        $totalfees = FeesRegister::where('sid', $sid)->sum('amount');
        $totalfees_aradhana = FeesRegister::where('sid', $sid)->where('firm', 'ARADHANA')->sum('amount');
        $totalfees_gandhidham = FeesRegister::where('sid', $sid)->where('firm', 'GANDHIDHAM')->sum('amount');
        $totalfees_bank_verified = FeesRegister::where('sid', $sid)->where('verified_with_bank', 'NO')->sum('amount');
        $totalfees_bank_verified_YES = FeesRegister::where('sid', $sid)->where('verified_with_bank', 'YES')->sum('amount');



        $title = "Fees Reports of .: " . $studentdata[0]->fname .  " " . $studentdata[0]->mname .  " " . $studentdata[0]->lname .  " ";

        return view('fees.fees_report_by_student', [
            "feesdata" => $data,
            "totalfees" => number_format($totalfees, 2),
            "totalfees_aradhana" => number_format($totalfees_aradhana, 2),
            "totalfees_bank_verified" => number_format($totalfees_bank_verified, 2),
            "totalfees_bank_verified_YES" => number_format($totalfees_bank_verified_YES, 2),
            "remaining_amount" => number_format($remaining_amount[0]->remaining_amount, 2),
            "totalfees_gandhidham" => number_format($totalfees_gandhidham, 2),
            "studentdata" => $studentdata,
            "title" => $title,
        ]);
    }

    public function fees_pending()
    {
        $data = Students::where('is_fees_completed', 'NO')
            ->select('students.id', 'students.fname', 'students.mname', 'students.lname', 'students.payable_fees', 'students.fees_duration', 'f.remaining_amount', 'f.id as feesid')
            ->leftJoin('fees as f', 'students.id', '=', 'f.sid')
            ->where('students.status', 'VISIBLE')
            ->get();



        return view('fees.fees_pending', ["data" => $data]);
    }
}
