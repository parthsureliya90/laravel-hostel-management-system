@extends('master')
@section('title', 'Edit Student')
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit   Student </h3>
            <div class="block-options">
                <a href="{{ route('students') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    List Student</a>
            </div>
        </div> 
        <div class="block-content"> 
            @include('flash')  
            <form action="{{ route('update-student') }}" method="POST" enctype="multipart/form-data" >
                <input type="hidden" value="{{ $data[0]->id }}" name="id">
                <input type="hidden" value="{{ $data[0]->photo }}" name="old_image">

                @csrf
                <div class="row mb-4">
                   <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-select  " id="example-select-floating" name="batch"
                                aria-label="Floating label select example">
                                <option>Select Batch</option>
                                @foreach ($batch as $item)
                                     <option value="{{ $item->id }}" {{ ($item->current_batch == "1")?'selected':'' }}>{{ $item->batch_name }}</option> 
                                @endforeach
                               
                            </select>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> College Status</label>
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-select  " id="example-select-floating" name="rooms"
                                aria-label="Floating label select example">
                                <option>Select Room</option>
                                   @foreach ($rooms as $ritem)
                                       <option value="{{ $ritem->id }}" {{ ($data[0]->room_id  ==  $ritem->id)?'selected':'' }}>{{ $ritem->building_name .' => '.$ritem->room_no }}</option>
                                   @endforeach
                            </select> <label  for="example-text-input-floating">Select Hostel Building and Room No. </label>
                        </div>
                    </div>
                    <div class="col-1  animated fadeIn">
                        <a class="img-link img-link-zoom-in img-thumb  " target="_blank" href="{{ config('app.URL') }}students/{{ $data[0]->photo }}">
                            <img class="img-fluid" src="{{ config('app.URL') }}students/{{ $data[0]->photo }}" alt="" width="50px">
                        </a>
                    </div>
                     <div class="col-11">
                        <div class="form-floating mb-4">
                            <input type="file" class="form-control form-control-sm" id="example-text-input-floating"
                                name="photo"   placeholder="Select Image">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>  Select Photo (500px X 500px Image)</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="first_name"  placeholder="Enter  First Name" value="{{ $data[0]->fname }}">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>  First Name</label>
                        </div>
                    </div>
                     <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="father_name" value="{{ $data[0]->mname }}" placeholder="Enter Father Name">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Father Name</label>
                        </div>
                    </div>
                     <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="surname" value="{{ $data[0]->lname }}" placeholder="Enter Surname">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Surname  </label>
                        </div>
                    </div> 
                    <hr>
                     <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="aadhaar_no" value="{{ $data[0]->a_no }}" placeholder="Enter Aadhaar Card No.">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Aadhaar Card No.</label>
                        </div>
                    </div>
                     <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="emg_contacts" value="{{ $data[0]->emg_contacts }}" placeholder="Enter Emergency Contact">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Emergency Contact  </label>
                        </div>
                    </div>
                     <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="father_contacts" value="{{ $data[0]->father_contacts }}" placeholder="Enter  Father's Contact">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Father's Contact  </label>
                        </div>
                    </div>
                     <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="student_contacts" value="{{ $data[0]->student_contacts }}" placeholder="Enter  Student's Contact">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Student's Contact  </label>
                        </div>
                    </div>
                     <div class="col-12">
                        <div class="form-floating mb-4">
                            <textarea class="form-control form-control-sm" name="address">{{ $data[0]->address }}</textarea>
                            
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Address  </label>
                        </div>
                    </div>
                      <hr>
                      <div class="col-2">
                        <div class="form-floating mb-4">
                            <select class="form-select" id="example-select-floating" name="blood_group"
                                aria-label="Floating label select example">
                                    <option   value="0">Select Blood Group</option>
                                    <option value="A+" {{ ($data[0]->blood_group == "A+")?'selected':'' }} >A+</option>
                                    <option value="A-" {{ ($data[0]->blood_group == "A-")?'selected':'' }} >A-</option>
                                    <option value="B+" {{ ($data[0]->blood_group == "B+")?'selected':'' }} >B+</option>
                                    <option value="B-" {{ ($data[0]->blood_group == "B-")?'selected':'' }} >B-</option>
                                    <option value="O+" {{ ($data[0]->blood_group == "O+")?'selected':'' }} >O+</option>
                                    <option value="O-" {{ ($data[0]->blood_group == "O+")?'selected':'' }} >O-</option>
                                    <option value="AB+" {{ ($data[0]->blood_group == "AB+")?'selected':'' }} >AB+</option>
                                    <option value="AB-" {{ ($data[0]->blood_group == "AB-")?'selected':'' }} >AB-</option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"> <span class="text-danger">*</span>  Blood Group</label>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <select class="form-select" id="example-select-floating" name="college_name"
                                aria-label="floating label select example">
                                <option>Select College</option>
                                   @foreach ($college as $item)
                                       <option value="{{ $item->id }}" {{ ($data[0]->college_id ==  $item->id)?'selected':'' }}>{{ $item->college_name }}</option>
                                   @endforeach
                            </select>
                            <label class="form-label" for="example-text-input-floating">Select College </label>
                        </div>
                    </div>
                     <div class="col-2">
                        <div class="form-floating mb-4">
                            <select class="form-select" id="example-select-floating" name="cource"
                                aria-label="Floating label select example">
                                    <option   value="0">Select Course</option>
                                    <option value="BCom" {{ ($data[0]->cource == "BCom")?'selected':'' }}>BCom</option>
                                    <option value="MCom" {{ ($data[0]->cource == "MCom")?'selected':'' }}>MCom</option>
                                    <option value="BCA" {{ ($data[0]->cource == "BCA")?'selected':'' }}>BCA</option>
                                    <option value="MCA" {{ ($data[0]->cource == "MCA")?'selected':'' }}>MCA</option>
                                    <option value="MBA" {{ ($data[0]->cource == "MBA")?'selected':'' }}>MBA</option>
                                    <option value="MSC(IT&CA)" {{ ($data[0]->cource == "MSC(IT&CA)")?'selected':'' }}>MSC(IT&amp;CA)</option>
                                    <option value="BA" {{ ($data[0]->cource == "BA")?'selected':'' }}>BA</option>
                                    <option value="MA" {{ ($data[0]->cource == "MA")?'selected':'' }}>MA</option>
                                    <option value="PHd" {{ ($data[0]->cource == "PHd")?'selected':'' }}>PHd</option>
                                    <option value="BE/B.Tech" {{ ($data[0]->cource == "BE/B.Tech")?'selected':'' }}>BE/B.Tech</option>
                                    <option value="B.Arch" {{ ($data[0]->cource == "B.Arch")?'selected':'' }}>B.Arch</option>
                                    <option value="B.Sc" {{ ($data[0]->cource == "B.Sc")?'selected':'' }}>B.Sc</option>
                                    <option value="BPharma" {{ ($data[0]->cource == "BPharma")?'selected':'' }}>BPharma</option>
                                    <option value="BDS" {{ ($data[0]->cource == "BDS")?'selected':'' }}>BDS</option>
                                    <option value="B.Ed" {{ ($data[0]->cource == "B.Ed")?'selected':'' }}>B.Ed</option>
                                    <option value="M.Ed" {{ ($data[0]->cource == "M.Ed")?'selected':'' }}>M.Ed</option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"> <span class="text-danger">*</span> Select Course</label>
                        </div>
                    </div>
                     <div class="col-2">
                        <div class="form-floating mb-4">
                            <select class="form-select" id="example-select-floating" name="year"
                                aria-label="Floating label select example">
                                    <option selected>Select  College Year</option>
                                    <option value="1st" {{ ($data[0]->year == "1st")?'selected':'' }}>1st</option> 
                                    <option value="2nd" {{ ($data[0]->year == "2nd")?'selected':'' }}>2nd</option> 
                                    <option value="3rd" {{ ($data[0]->year == "3rd")?'selected':'' }}>3rd</option> 
                                    <option value="4th" {{ ($data[0]->year == "4th")?'selected':'' }}>4th</option> 
                            </select>
                            <label class="form-label" for="example-text-input-floating"> <span class="text-danger">*</span>  College Year</label>
                        </div>
                    </div>
                     <div class="col-3">
                        <div class="form-floating mb-4">
                            <select class="form-select" id="example-select-floating" name="status"
                                aria-label="Floating label select example">
                                <option>Select Status</option>
                                <option value="VISIBLE" {{ ($data[0]->status == "VISIBLE")?'selected':'' }}>VISIBLE</option>
                                <option value="HIDDEN" {{ ($data[0]->status == "HIDDEN")?'selected':'' }}>HIDDEN</option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> College Status</label>
                        </div>
                    </div>
                     <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Save Student" class="btn btn-outline-primary btn-sm  js-click-ripple-enabled" data-toggle="click-ripple">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
