<?php

namespace App\Http\Controllers;

use App\Models\Expences;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExpencesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $data = null;
        $toal_amount = 00;
        if (empty($request->date_from) && empty($request->date_to)) {

            $date_from =   Carbon::now()->format('Y-m-01');
            $date_to = Carbon::now()->format('Y-m-t');
            $data = Expences::whereBetween('trans_date', [$date_from, $date_to])->get();
            $toal_amount_expcnce = Expences::whereBetween('trans_date', [$date_from, $date_to])->where('type', 'EXPENCE')->sum('amount');
            $toal_amount_income = Expences::whereBetween('trans_date', [$date_from, $date_to])->where('type', 'INCOME')->sum('amount');
            $netprofit = $toal_amount_income - $toal_amount_expcnce;
        } else {
            $date_from = $request->date_from;
            $date_to = $request->date_to;

            $data = Expences::whereBetween('trans_date', [$date_from, $date_to])->get();
            $toal_amount_expcnce = Expences::whereBetween('trans_date', [$date_from, $date_to])->where('type', 'EXPENCE')->sum('amount');
            $toal_amount_income = Expences::whereBetween('trans_date', [$date_from, $date_to])->where('type', 'INCOME')->sum('amount');

            $netprofit = $toal_amount_income - $toal_amount_expcnce;
        }


        return view('expences.list', [
            "date_from" => $date_from,
            "date_to" => $date_to,
            "toal_amount_expcnce" => number_format($toal_amount_expcnce, 2),
            "toal_amount_income" => number_format($toal_amount_income, 2),
            "netprofit" => number_format($netprofit, 2),
            "data" => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expences.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'type' => 'required',
            'expence_date' => 'required|date',
        ]);


        $save = new Expences();
        $save->title = $request->input('title');
        $save->type = $request->input('type');
        $save->amount = floatval($request->input('amount'));
        $save->trans_date = date('Y-m-d', strtotime($request->input('expence_date')));
        $save->remarks = $request->input('remarks');
        if ($save->save()) {
            return back()->with('success', ' New Expence Added !');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }


    public function destroy($id)
    {
        $destroy = Expences::destroy($id);
        if ($destroy) {
            return back()->with('success', ' Selected Item is Removed !');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
}
