<?php

namespace App\Http\Controllers;

use App\Models\FeesRegister;
use App\Models\Students;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function print_recipt($sid, $frid, $firm)
    {
        if (empty($sid)) {
            return route('dashboard');
        }
        if (empty($frid)) {
            return route('dashboard');
        }
        if (empty($firm)) {
            return route('dashboard');
        }

        $student = Students::find($sid)->select('fname', 'mname', 'lname', 'cource', 'year', 'fees_duration')->get();
        $feedata = FeesRegister::find($frid);



        if ($firm == "TYPE_ONE") {
            return view('fees.print_recipt_type_one', ["student" => $student, "feesdata" => $feedata]);
        } else {
            return view('fees.print_recipt_type_two', ["student" => $student, "feesdata" => $feedata]);
        }
    }
}
