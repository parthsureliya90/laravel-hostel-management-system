<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\FeesRegister;
use App\Models\Expences;
use Carbon\Carbon;

class DashBoardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        $today = date('Y-m-d');

        $date_from =   Carbon::now()->format('Y-m-01');
        $date_to = Carbon::now()->format('Y-m-t');
        $toal_amount_expcnce = Expences::whereBetween('trans_date', [$date_from, $date_to])->where('type', 'EXPENCE')->sum('amount');
        $toal_amount_income = Expences::whereBetween('trans_date', [$date_from, $date_to])->where('type', 'INCOME')->sum('amount');
        $netprofit = $toal_amount_income - $toal_amount_expcnce;

        $feesdata = FeesRegister::where('paid_date', $today)->get();
        $bankverfieid = FeesRegister::where('verified_with_bank', 'NO')->get();

        return view('dashboard', [
            "data" => $feesdata,
            'bank' => $bankverfieid,
            "toal_amount_expcnce" => number_format($toal_amount_expcnce, 2),
            "toal_amount_income" => number_format($toal_amount_income, 2),
            "netprofit" => number_format($netprofit, 2),

        ]);
    }
}
