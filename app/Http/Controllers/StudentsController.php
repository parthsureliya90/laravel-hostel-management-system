<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\College;
use App\Models\Fees;
use App\Models\Students;
use App\Models\Rooms;
use Illuminate\Http\Request;
use File;
use Config;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function students()
    {
        return view('students.students', ['data' => Students::paginate()]);
    }
    public function students_add()
    {
        $rooms = Rooms::leftJoin('buildings_master', 'rooms_master.building_id', '=', 'buildings_master.id')->select('rooms_master.*', 'buildings_master.building_name')->get();
        return view('students.students_add', ['college' => College::where('status', 'VISIBLE')->orderBy('college_name', 'ASC')->get(), 'batch' => Batch::all(), "rooms" => $rooms]);
    }
    public function save_student(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:800',
            'batch' => 'required',
            'rooms' => 'required',
            'first_name' => 'required|string',
            'father_name' => 'required|string',
            'surname' => 'required|string',
            'aadhaar_no' => 'required|numeric',
            'emg_contacts' => 'required|numeric|digits:10',
            'father_contacts' => 'required|numeric|digits:10',
            'student_contacts' => 'required|numeric|digits:10',
            'address' => 'required|string',
            'blood_group' => 'required|string',
            'college_name' => 'required',
            'cource' => 'required|string',
            'year' => 'required|string',
            'status' => 'required|string',
            'payable_fees' => 'required|numeric',
            'fees_duration' => 'required|numeric',
        ]);

        $remaining_amount = $request->input("payable_fees") *  $request->input("fees_duration");

        $imageName = time() . '.' . $request->photo->extension();
        $save = new Students();
        $save->photo = $imageName;
        $save->batch_id = $request->input("batch");
        $save->room_id = $request->input("rooms");
        $save->batch_name = $this->getBatchName($request->input("batch"));
        $save->a_no = $request->input("aadhaar_no");
        $save->fname = ucfirst($request->input("first_name"));
        $save->mname = ucfirst($request->input("father_name"));
        $save->lname = ucfirst($request->input("surname"));
        $save->father_contacts = $request->input("father_contacts");
        $save->emg_contacts = $request->input("emg_contacts");
        $save->student_contacts = $request->input("student_contacts");
        $save->address = $request->input("address");
        $save->blood_group = $request->input("blood_group");
        $save->college_id = $request->input("college_name");
        $save->year = $request->input("year");
        $save->cource = $request->input("cource");
        $save->status = $request->input("status");
        $save->payable_fees = $remaining_amount;
        $save->fees_duration = $request->input("fees_duration");
        if ($save->save()) {
            $request->photo->move(public_path('students'), $imageName);
            $sid = $save->id;


            $remaining_fees = new Fees();
            $remaining_fees->sid = $sid;
            $remaining_fees->batch_id = $request->input("batch");
            $remaining_fees->remaining_amount = $remaining_amount;
            $remaining_fees->save();
            $msg = 'New Student Added. ! Now Add Fees Here. Remaining Fees Amount is :.' . $remaining_amount;
            return redirect()->route('fees_pay', ['id' => $sid, "type" => "JOINING"])->with('success', $msg);
        } else {
            return back()->with('warning', 'Try Again');
        }
    }
    public function edit_student(Request $request)
    {
        $rooms = Rooms::leftJoin('buildings_master', 'rooms_master.building_id', '=', 'buildings_master.id')->select('rooms_master.*', 'buildings_master.building_name')->get();

        return view('students.students_edit', ['data' => Students::where('id', $request->id)->get(), 'college' => College::where('status', 'VISIBLE')->orderBy('college_name', 'ASC')->get(), 'batch' => Batch::all(), "rooms" => $rooms]);
    }
    public function update_student(Request $request)
    {
        $id = $request->id;


        if (!empty($request->photo)) {
            $request->validate([
                'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:800',
                'batch' => 'required',
                'rooms' => 'required',
                'first_name' => 'required|string',
                'father_name' => 'required|string',
                'surname' => 'required|string',
                'aadhaar_no' => 'required|numeric',
                'emg_contacts' => 'required|numeric|digits:10',
                'father_contacts' => 'required|numeric|digits:10',
                'student_contacts' => 'required|numeric|digits:10',
                'address' => 'required|string',
                'blood_group' => 'required|string',
                'college_name' => 'required',
                'cource' => 'required|string',
                'year' => 'required|string',
                'status' => 'required|string',
            ]);
            $imageName = time() . '.' . $request->photo->extension();

            $save = Students::find($id);
            $save->photo = $imageName;
            $save->room_id = $request->input("rooms");
            $save->batch_id = $request->input("batch");
            $save->batch_name = $this->getBatchName($request->input("batch"));
            $save->a_no = $request->input("aadhaar_no");
            $save->fname = ucfirst($request->input("first_name"));
            $save->mname = ucfirst($request->input("father_name"));
            $save->lname = ucfirst($request->input("surname"));
            $save->father_contacts = $request->input("father_contacts");
            $save->emg_contacts = $request->input("emg_contacts");
            $save->student_contacts = $request->input("student_contacts");
            $save->address = $request->input("address");
            $save->blood_group = $request->input("blood_group");
            $save->college_id = $request->input("college_name");
            $save->year = $request->input("year");
            $save->cource = $request->input("cource");
            $save->status = $request->input("status");

            if ($save->save()) {
                File::delete(public_path("students" . "/" . $request->old_image));
                $request->photo->move(public_path('students'), $imageName);
                return back()->with('success', '  Student Details are Updated');
            } else {
                return back()->with('warning', 'Try Again');
            }
        } else {
            $request->validate([
                'batch' => 'required',
                'rooms' => 'required',
                'first_name' => 'required|string',
                'father_name' => 'required|string',
                'surname' => 'required|string',
                'aadhaar_no' => 'required|numeric',
                'emg_contacts' => 'required|numeric|digits:10',
                'father_contacts' => 'required|numeric|digits:10',
                'student_contacts' => 'required|numeric|digits:10',
                'address' => 'required|string',
                'blood_group' => 'required|string',
                'college_name' => 'required',
                'cource' => 'required|string',
                'year' => 'required|string',
                'status' => 'required|string',
            ]);
            $save = Students::find($id);
            $save->room_id = $request->input("rooms");
            $save->batch_id = $request->input("batch");
            $save->batch_name = $this->getBatchName($request->input("batch"));
            $save->a_no = $request->input("aadhaar_no");
            $save->fname = ucfirst($request->input("first_name"));
            $save->mname = ucfirst($request->input("father_name"));
            $save->lname = ucfirst($request->input("surname"));
            $save->father_contacts = $request->input("father_contacts");
            $save->emg_contacts = $request->input("emg_contacts");
            $save->student_contacts = $request->input("student_contacts");
            $save->address = $request->input("address");
            $save->blood_group = $request->input("blood_group");
            $save->college_id = $request->input("college_name");
            $save->year = $request->input("year");
            $save->cource = $request->input("cource");
            $save->status = $request->input("status");


            if ($save->save()) {
                return back()->with('success', '  Student Details are Updated');
            } else {
                return back()->with('warning', 'Try Again');
            }
        }
    }


    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required',
        ]);
        $body = null;
        if ($request->ajax()) {
            $search = $request->search;
            $data = Students::orWhere('fname', 'LIKE', $search . '%')
                ->orWhere('mname', 'LIKE', $search . '%')
                ->orWhere('lname', 'LIKE', $search . '%')
                ->orWhere('father_contacts', 'LIKE', $search . '%')
                ->orWhere('emg_contacts', 'LIKE', $search . '%')
                ->orWhere('student_contacts', 'LIKE', $search . '%')
                ->orWhere('a_no', 'LIKE', $search . '%')
                ->get();


            foreach ($data as $key => $item) {


                $body .= ' <div class="col-2">

                   <a class="block block-rounded block-link-pop text-center" href="' . route('edit-student', ['id' => $item->id]) . '" target="_blank">
                    <div class="block-content block-content-full block-content-sm bg-success text-white">
                              <div class="fw-semibold">BATCH : ' . $item->batch_name . '</div>
                            </div>
                            <div class="block-content block-content-full">

                              <img class="img-avatar" src="' . Config('app.URL')  . 'students/' .  $item->photo  . '" alt="">
                            </div>
                            <div class="block-content block-content-full bg-body-light"> 
                              <div class="fw-semibold ">' . $item->fname . " " . $item->mname . " " . $item->lname . '</div> 
                              <div class="fs-sm text-muted" >Adhar No. : ' . $item->a_no . '</div>
                              <div class="fs-sm text-muted" >Emergency : ' . $item->emg_contacts . '</div>
                              <div class="fs-sm text-muted" >Student`s : ' . $item->student_contacts . '</div>
                              <div class="fs-sm text-muted" >Father`s : ' . $item->father_contacts . '</div>
                            </div>


                          </a>
                </div>';
            }
            if (!empty($body)) {
                return json_encode(["body" => $body, "status" => 1]);
            } else {
                return json_encode(["body" => null, "status" => 0]);
            }
        }
    }
    public function students_id_card()
    {


        $data = Students::where('status', 'VISIBLE')->get();

        return view('students.students_id_card', ["data" => $data]);
    }
    public function print_id_card(Request $request)
    {

        $sid = $request->id;
        $name = $request->name;
        $data = Students::where('status', 'VISIBLE')->where('id', $sid)->get();

        $title = "ID Card : " . $data[0]->fname . " " . $data[0]->mname . " " . $data[0]->lname;

        $college = College::where('id', $data[0]->college_id)->select('college_name')->get();
        return view('students.prints_id_card', ["data" => $data, "title" => $title, "college" => $college[0]->college_name, 'name' => $name]);
    }


    public function getBatchName($id)
    {
        $batchname = Batch::where('id', $id)->get();
        return $batchname[0]->batch_name;
    }
}
