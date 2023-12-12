<?php

namespace App\Http\Controllers;

use App\Models\Buildings;
use Illuminate\Http\Request;

class BuildingsController extends Controller
{
    public function buildings()
    {
        return view("buildings.buildings", [
            "data" => Buildings::orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }
    public function buildings_add(Request $request)
    {

        return view("buildings.add_buildings");
    }
    public function save_buildings(Request $request)
    {
        $request->validate([
            'building_name' => 'required|unique:buildings_master',
            'status' => 'required',
        ]);


        $building_name = $request->input("building_name");
        $status = $request->input("status");

        $save = new Buildings();
        $save->building_name = $building_name;
        $save->status = $status;


        if ($save->save()) {
            return back()->with('success', 'New Hostel Building Added');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function buildings_edit(Request $request)
    {
        if (empty($request->id)) {
            return back()->with('warning', 'Try Again');
        }

        return view("buildings.edit_buildings", [
            "data" => Buildings::find($request->id)
        ]);
    }
    public function update_buildings(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'building_name' => 'required',
            'status' => 'required',
        ]);


        $id = $request->input("id");
        $building_name = $request->input("building_name");
        $status = $request->input("status");

        $update = Buildings::find($id);
        $update->building_name = $building_name;
        $update->status = $status;


        if ($update->save()) {
            return back()->with('success', '  Hostel Bulding Details Updated');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function status_buildings(Request $request)
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
        $update = Buildings::find($id);
        $update->status = $status;
        if ($update->save()) {
            return back()->with('success', 'Status Changed to.:' . $status);
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
}
