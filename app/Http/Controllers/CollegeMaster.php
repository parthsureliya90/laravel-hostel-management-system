<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\Students;
use Illuminate\Http\Request;

class CollegeMaster extends Controller
{
    public function college()
    {
        return view("college.college", [
            "data" => College::orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }
    public function college_add(Request $request)
    {

        return view("college.add_college");
    }

    public function save_college(Request $request)
    {
        $request->validate([
            'college_name' => 'required|unique:collage_master',
            'status' => 'required',
            'location' => 'required',
        ]);


        $college_name = $request->input("college_name");
        $location = $request->input("location");
        $status = $request->input("status");

        $save = new College();
        $save->college_name = $college_name;
        $save->location = $location;
        $save->status = $status;


        if ($save->save()) {
            return back()->with('success', 'New College Added');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function college_edit(Request $request)
    {
        if (empty($request->id)) {
            return back()->with('warning', 'Try Again');
        }

        return view("college.edit_college", [
            "data" => College::find($request->id)
        ]);
    }
    public function update_college(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'college_name' => 'required',
            'status' => 'required',
            'location' => 'required',
        ]);


        $id = $request->input("id");
        $college_name = $request->input("college_name");
        $location = $request->input("location");
        $status = $request->input("status");

        $update = College::find($id);
        $update->college_name = $college_name;
        $update->location = $location;
        $update->status = $status;


        if ($update->save()) {
            return back()->with('success', '  College Details Updated');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function status_college(Request $request)
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
        $update = College::find($id);
        $update->status = $status;
        if ($update->save()) {
            return back()->with('success', 'Status Changed to.:' . $status);
        } else {
            return back()->with('warning', 'Try Again');
        }
    }

    public function studnets_by_collage($id, $name)
    {
        return view("college.studnets_by_collage", [
            "data" => Students::where('college_id', $id)->where('status', 'VISIBLE')
                ->select('fname', 'lname', 'mname', 'father_contacts', 'student_contacts')->get(),
            "name" => $name
        ]);
    }
}
