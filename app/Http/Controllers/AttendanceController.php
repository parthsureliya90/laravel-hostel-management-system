<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Batch;
use App\Models\Students;
use Illuminate\Http\Request;
use DB;

class AttendanceController extends Controller
{
    public function attendance($adate = null)
    {
        return view("attendance.attendance");
    }
    public function create_attendance(Request $request)
    {
        $request->validate([
            'attendance_date' => 'required|unique:attendance',
            'type' => 'required',
        ]);


        $attendance_date = date('Y-m-d', strtotime($request->input('attendance_date')));
        $type = $request->input('type');


        $check_exit = Attendance::where('attendance_date', $attendance_date)->count();
        if ($check_exit > 0) {
            return back()->with('warning', 'Attendance is already Created for this date : ' . date('d-m-Y', strtotime($attendance_date)));
        }


        $students = Students::where('status', 'VISIBLE')->select('id')->get();
        $dummy = array();
        $insert = array();
        foreach ($students as $s) {
            $dummy = [
                'sid' => $s->id,
                'type' => $type,
                'attendance_date' => $attendance_date,
                'created_at' => date('Y-m-d h:i:s'),
            ];

            array_push($insert, $dummy);
        }

        $create = Attendance::insert($insert);



        if ($create) {
            return redirect()->route('edit_attandance', ['date' => $attendance_date])->with('success', 'New Attendance Added');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function view_attendance(Request $request)
    {

        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
        ]);


        $date_from = date('Y-m-d', strtotime($request->input('date_from')));
        $date_to = date('Y-m-d', strtotime($request->input('date_to')));

        $title = "Attendance Report from Date:. <strong>" . date('d, M Y', strtotime($request->input('date_from'))) . " </strong> to Date:.  <strong>" . date('d, M Y', strtotime($request->input('date_to'))) . " </strong>";

        $date1_ts = strtotime($date_from);
        $date2_ts = strtotime($date_to);
        $diff = $date2_ts - $date1_ts;
        $total_days =  round($diff / 86400) + 1;

        $total_students = Students::where('status', 'VISIBLE')->select('id', 'fname', 'mname', 'lname')->get();

        $totalData = [];
        $fetchData = \App\Models\Attendance::where([['attendance_date', '>=', $date_from], ['attendance_date', '<=', $date_to]])->get();



        foreach ($fetchData as $tData) {
            $totalData[$tData->attendance_date][$tData->sid] = $tData->type;
        }

        return view('attendance.view_attandance', [
            'totalData' => $totalData,
            'title' => $title,
            'total_students' => $total_students,
            'days' => $total_days,
            'start_day' => date('d', strtotime($date_from)),
            'end_day' => date('d', strtotime($date_to)),
            'date_from' => date('Y-m-d', strtotime($date_from)),
            'date_to' => date('Y-m-d', strtotime($date_to)),
            'month' => date('m', strtotime($date_from)),
            'year' => date('Y', strtotime($date_from)),
        ]);
    }
    public function print_attendance(Request $request)
    {

        $request->validate([
            'date_from' => 'required',
            'date_to' => 'required',
        ]);

        $date_from = date('Y-m-d', strtotime($request->input('date_from')));
        $date_to = date('Y-m-d', strtotime($request->input('date_to')));

        $title = "Attendance Report from Date:. <strong>" . date('d, M Y', strtotime($request->input('date_from'))) . " </strong> to Date:.  <strong>" . date('d, M Y', strtotime($request->input('date_to'))) . " </strong>";

        $date1_ts = strtotime($date_from);
        $date2_ts = strtotime($date_to);
        $diff = $date2_ts - $date1_ts;
        $total_days =  round($diff / 86400) + 1;

        $total_students = Students::where('status', 'VISIBLE')->select('id', 'fname', 'mname', 'lname')->get();

        $totalData = [];
        $fetchData = \App\Models\Attendance::where([['attendance_date', '>=', $date_from], ['attendance_date', '<=', $date_to]])->get();



        foreach ($fetchData as $tData) {
            $totalData[$tData->attendance_date][$tData->sid] = $tData->type;
        }
        // echo "<pre>";
        // print_r($totalData);

        // exit;


        return view('attendance.print_attendance', [
            'totalData' => $totalData,
            'title' => $title,
            'total_students' => $total_students,
            'days' => $total_days,
            'start_day' => date('d', strtotime($date_from)),
            'end_day' => date('d', strtotime($date_to)),
            'date_from' => date('Y-m-d', strtotime($date_from)),
            'date_to' => date('Y-m-d', strtotime($date_to)),
            'month' => date('m', strtotime($date_from)),
            'year' => date('Y', strtotime($date_from)),
        ]);
    }

    public function edit_attandance(Request $request)
    {
        $request->validate([
            'date' => 'required',
        ]);

        $attendance_date = $request->input('date');
        $attData = DB::table('attendance as a')
            ->leftJoin('students as s', 's.id', '=', 'a.sid')->select('a.type', 'a.sid', 'a.id', 'a.attendance_date',  's.fname', 's.lname', 's.mname')
            ->where('a.attendance_date', $attendance_date)
            ->get();




        $date_from = date("Y-m-01", strtotime($attendance_date));
        $date_to = date("Y-m-t", strtotime($attendance_date));

        $title = "Attandance for Date:. " . date('d-m-Y', strtotime($attendance_date));
        return view('attendance.edit_attandance', ["attData" => $attData, "attendance_date" => $attendance_date, "date_from" => $date_from, "date_to" => $date_to, "title" => $title]);
    }
    public function update_attandance(Request $request)
    {
        $request->validate([
            'action' => 'required',
            'attendance_date' => 'required',
            'data' => 'required',
        ]);

        $dataArr = json_decode($request->input('data'));
        $attendance_date = $request->input('attendance_date');

        $dummy = array();
        $insert = array();
        $success = 0;
        $failes = 0;
        foreach ($dataArr as $key => $item) {
            $type = $item->attvalue;
            $id = $item->id;
            $update = Attendance::find($id);
            $update->type = $type;
            $update->updated_at = date("Y-m-d");
            if ($update->save()) {
                $success++;
            } else {
                $failes++;
            }
        }

        $message = "Total " . $success . " Attandance Updated for Date:. " . date('d-m-Y', strtotime($attendance_date));
        $data_array = array("msg" => $message, "status" => 1);
        echo json_encode($data_array);
        exit();
    }
}
