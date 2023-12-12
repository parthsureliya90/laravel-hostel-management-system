<?php

namespace App\Http\Controllers;

use App\Models\Buildings;
use App\Models\Rooms;
use Illuminate\Http\Request;
use DB;

class RoomController extends Controller
{
    public function rooms()
    {
        return view("rooms.rooms", [

            "data" => DB::table('rooms_master as rm')
                ->leftJoin('buildings_master as bm', 'rm.building_id', '=', 'bm.id')
                ->where('bm.status', 'VISIBLE')->select('rm.*', 'bm.building_name')
                ->paginate()
        ]);
    }
    public function studnets_by_rooms($id)
    {
        return view("rooms.studnets_by_rooms", [
            "data" => DB::table('rooms_master as rm', 'students as s')
                ->leftJoin('buildings_master as bm', 'rm.building_id', '=', 'bm.id')
                ->leftJoin('students as s', 'rm.id', '=', 's.room_id')
                ->where('bm.status', 'VISIBLE')
                ->where('rm.id', $id)
                ->select('rm.*', 'bm.building_name', 's.id as student_id', 's.fname', 's.lname', 's.mname')
                ->get()
        ]);
    }
    public function rooms_add(Request $request)
    {
        return view("rooms.add_rooms", ["buildings" => Buildings::where('status', "VISIBLE")->get()]);
    }
    public function save_rooms(Request $request)
    {
        $request->validate([
            'room_no' => 'required',
            'status' => 'required',
            'building' => 'required|numeric',
        ]);


        $room_no = $request->input("room_no");
        $status = $request->input("status");
        $building = $request->input("building");

        $save = new Rooms();
        $save->building_id = $building;
        $save->room_no = $room_no;
        $save->status = $status;


        if ($save->save()) {
            return back()->with('success', 'New  Room Added to  Building ');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function rooms_edit(Request $request)
    {
        if (empty($request->id)) {
            return back()->with('warning', 'Try Again');
        }

        return view("rooms.edit_rooms", [
            "data" => Rooms::find($request->id), "buildings" => Buildings::where('status', "VISIBLE")->get()
        ]);
    }
    public function update_rooms(Request $request)
    {
        $request->validate([
            'room_no' => 'required',
            'status' => 'required',
            'building' => 'required|numeric',
        ]);



        $room_no = $request->input("room_no");
        $status = $request->input("status");
        $building = $request->input("building");

        $id = $request->input("id");

        $update = Rooms::find($id);
        $update->building_id = $building;
        $update->room_no = $room_no;
        $update->status = $status;
        if ($update->save()) {
            return back()->with('success', '  Hostel Room Details Updated');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function status_rooms(Request $request)
    {
        if (empty($request->id)) {
            return back()->with('warning', 'Try Again');
        }
        if (empty($request->status)) {
            return back()->with('warning', 'Try Again');
        }

        $status = "";
        if ($request->status == "HIDDEN") {
            $status = "HIDDEN";
        } elseif ($request->status == "VISIBLE") {
            $status = "VISIBLE";
        } else {
            return back()->with('warning', 'Try Again');
        }
        $id = $request->id;
        $update = Rooms::find($id);
        $update->status = $status;
        if ($update->save()) {
            return back()->with('success', 'Status Changed to.: ' . $status);
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
}
