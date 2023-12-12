@extends('master')
@section('title', 'Add New Student')
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New Student </h3>
            <div class="block-options">
                <a href="{{ route('students') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    List Student</a>
            </div>
        </div>
        <div class="block-content">

            @include('flash')
            <form action="{{ route('save-student') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-4">

                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <select class="form-select select2" id="example-select-floating" name="batch"
                                aria-label="Floating label select example">
                                <option>Select Batch</option>
                                @foreach ($batch as $item)
                                    <option value="{{ $item->id }}" {{ $item->current_batch == '1' ? 'selected' : '' }}>
                                        {{ $item->batch_name }}</option>
                                @endforeach

                            </select>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                College Status</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="file" class="form-control form-control-sm" id="example-text-input-floating"
                                name="photo" placeholder="Select Image">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Select Photo (500px X 500px Image)</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <select class="form-select select2" id="example-select-floating" name="rooms"
                                aria-label="Floating label select example">
                                <option>Select Room</option>
                                @foreach ($rooms as $item)
                                    <option value="{{ $item->id }}" {{ old('rooms') == $item->id ? 'selected' : '' }}>
                                        {{ $item->building_name . ' => ' . $item->room_no }}</option>
                                @endforeach
                            </select> <label for="example-text-input-floating">Select Hostel Building and Room No. </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="first_name" value="{{ old('first_name') }}" placeholder="Enter  First Name">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                First Name</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="father_name" value="{{ old('father_name') }}" placeholder="Enter Father Name">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Father Name</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="surname" value="{{ old('surname') }}" placeholder="Enter Surname">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Surname </label>
                        </div>
                    </div>
                    <hr>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="aadhaar_no" value="{{ old('aadhaar_no') }}" placeholder="Enter Aadhaar Card No.">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Aadhaar Card No.</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="emg_contacts" value="{{ old('emg_contacts') }}"
                                placeholder="Enter Emergency Contact">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Emergency Contact </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="father_contacts" value="{{ old('father_contacts') }}"
                                placeholder="Enter  Father's Contact">
                            <label class="form-label" for="example-text-input-floating"><span
                                    class="text-danger">*</span> Father's Contact </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="student_contacts" value="{{ old('student_contacts') }}"
                                placeholder="Enter  Student's Contact">
                            <label class="form-label" for="example-text-input-floating"><span
                                    class="text-danger">*</span> Student's Contact </label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <textarea class="form-control form-control-sm" name="address">{{ old('address') }}</textarea>

                            <label class="form-label" for="example-text-input-floating"><span
                                    class="text-danger">*</span> Address </label>
                        </div>
                    </div>
                    <hr>
                    <div class="col-2">
                        <div class="form-floating mb-4">
                            <select class="form-select select2" id="example-select-floating" name="blood_group"
                                aria-label="Floating label select example">
                                <option value="0">Select Blood Group</option>
                                <option value="A+" {{ old('blood_group') == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ old('blood_group') == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ old('blood_group') == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ old('blood_group') == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="O+" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ old('blood_group') == 'O+' ? 'selected' : '' }}>O-</option>
                                <option value="AB+" {{ old('blood_group') == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ old('blood_group') == 'AB-' ? 'selected' : '' }}>AB-</option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"> <span
                                    class="text-danger">*</span> Blood Group</label>
                        </div>
                    </div>

                    <div class="col-3">
                        <div class="form-group mb-4">
                            <label for="example-text-input-floating">Select College </label>
                            <select class="form-control select2" id="example-select-floating" name="college_name">
                                <option>Select College</option>
                                @foreach ($college as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('college_name') == $item->id ? 'selected' : '' }}>{{ $item->college_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-floating mb-4">
                            <select class="form-control select2" id="example-select-floating" name="cource"
                                aria-label="Floating label select example">
                                <option value="0">Select Course</option>
                                <option value="BCom" {{ old('cource') == 'BCom' ? 'selected' : '' }}>BCom</option>
                                <option value="MCom" {{ old('cource') == 'MCom' ? 'selected' : '' }}>MCom</option>
                                <option value="BCA" {{ old('cource') == 'BCA' ? 'selected' : '' }}>BCA</option>
                                <option value="MCA" {{ old('cource') == 'MCA' ? 'selected' : '' }}>MCA</option>
                                <option value="MBA" {{ old('cource') == 'MBA' ? 'selected' : '' }}>MBA</option>
                                <option value="MSC(IT&CA)" {{ old('cource') == 'MSC(IT&CA)' ? 'selected' : '' }}>
                                    MSC(IT&amp;CA)</option>
                                <option value="BA" {{ old('cource') == 'BA' ? 'selected' : '' }}>BA</option>
                                <option value="MA" {{ old('cource') == 'MA' ? 'selected' : '' }}>MA</option>
                                <option value="PHd" {{ old('cource') == 'PHd' ? 'selected' : '' }}>PHd</option>
                                <option value="BE/B.Tech" {{ old('cource') == 'BE/B.Tech' ? 'selected' : '' }}>BE/B.Tech
                                </option>
                                <option value="B.Arch" {{ old('cource') == 'B.Arch' ? 'selected' : '' }}>B.Arch</option>
                                <option value="B.Sc" {{ old('cource') == 'B.Sc' ? 'selected' : '' }}>B.Sc</option>
                                <option value="BPharma" {{ old('cource') == 'BPharma' ? 'selected' : '' }}>BPharma
                                </option>
                                <option value="BDS" {{ old('cource') == 'BDS' ? 'selected' : '' }}>BDS</option>
                                <option value="B.Ed" {{ old('cource') == 'B.Ed' ? 'selected' : '' }}>B.Ed</option>
                                <option value="M.Ed" {{ old('cource') == 'M.Ed' ? 'selected' : '' }}>M.Ed</option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"> <span
                                    class="text-danger">*</span> Select Course</label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-floating mb-4">
                            <select class="form-control select2" id="example-select-floating" name="year"
                                aria-label="Floating label select example">
                                <option selected>Select College Year</option>
                                <option value="1st" {{ old('year') == '1st' ? 'selected' : '' }}>1st</option>
                                <option value="2nd" {{ old('year') == '2nd' ? 'selected' : '' }}>2nd</option>
                                <option value="3rd" {{ old('year') == '3rd' ? 'selected' : '' }}>3rd</option>
                                <option value="4th" {{ old('year') == '4th' ? 'selected' : '' }}>4th</option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"> <span
                                    class="text-danger">*</span> College Year</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group mb-4">
                            <label class="" for="example-text-input-floating"><span class="text-danger">*</span>
                                Students Status</label>
                            <select class="form-control select2" id="example-select-floating" name="status"
                                aria-label="Floating label select example">
                                <option>Select Status</option>
                                <option value="VISIBLE" {{ old('status') == 'VISIBLE' ? 'selected' : '' }}>VISIBLE
                                </option>
                                <option value="HIDDEN" {{ old('status') == 'HIDDEN' ? 'selected' : '' }}>HIDDEN</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-select  " id="example-select-floating" name="fees_duration"
                                aria-label="Floating label select example">
                                <option value="0">Select Fees Duration</option>
                                @for ($x = 1; $x <= 12; $x++)
                                    <option value="{{ $x }}"
                                        {{ old('fees_duration') == $x ? 'selected' : '' }}>{{ $x }}
                                    </option>
                                @endfor
                            </select>
                            <label class="form-label" for="example-text-input-floating"> <span
                                    class="text-danger">*</span> Select Month</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="payable_fees" value="{{ old('payable_fees') }}" placeholder="Enter  Payable Fees">
                            <label class="form-label" for="example-text-input-floating"><span
                                    class="text-danger">*</span>Payable Fees <span class="text-info">(Enter Per Month
                                    Fees)</span></label>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Save Student"
                                class="btn btn-outline-primary btn-sm  js-click-ripple-enabled"
                                data-toggle="click-ripple">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
