<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Students;
use Illuminate\Http\Request;
use DB;

class BatchController extends Controller
{
    public function batch()
    {
        return view("batch.batch", [
            "data" => Batch::orderBy('created_at', 'DESC')->paginate(10)
        ]);
    }
    public function batch_add(Request $request)
    {

        return view("batch.add_batch");
    }
    public function save_batch(Request $request)
    {
        $request->validate([
            'batch_name' => 'required|unique:batch',
            'current_batch' => 'required',
        ]);


        $batch_name = $request->input("batch_name");
        $current_batch = $request->input("current_batch");

        if ($current_batch == 1) {
            $updateotherbatch =
                Batch::query()->update(['current_batch' => '0',]);
        }

        $save = new Batch();
        $save->batch_name = $batch_name;
        $save->current_batch = $current_batch;


        if ($save->save()) {
            return back()->with('success', 'New Batch Added');
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function batch_edit(Request $request)
    {
        if (empty($request->id)) {
            return back()->with('warning', 'Try Again');
        }

        return view("batch.edit_batch", [
            "data" => Batch::find($request->id)
        ]);
    }
    public function update_batch(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'batch_name' => 'required',
            'current_batch' => 'required',
        ]);


        $id = $request->input("id");
        $batch_name = $request->input("batch_name");
        $current_batch = $request->input("current_batch");



        if ($current_batch == 1) {
            $updateotherbatch =
                Batch::query()->update(['current_batch' => '0',]);
        }
        $update = Batch::find($id);
        $update->batch_name = $batch_name;
        $update->current_batch = $current_batch;


        if ($update->save()) {

            $st = Students::where('batch_id', $id)->update(['batch_name' => $batch_name]);

            return back()->with('success', ' Batch Details Updated');
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
