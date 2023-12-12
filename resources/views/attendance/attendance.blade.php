@extends('master')
@section('title',"  Attendance Sheet")
@section('body')
 
                  @include('flash')
<div class="block block-rounded">
  
                <div class="block-header block-header-default">
                  <h3 class="block-title">Create Attendance Sheet </h3>

                   
                </div>
                <div class="block-content"> 
                     <form action="{{ route('create_attendance') }}" class="form-group" method="POST" autocomplete="off">
                      @csrf
                  <div class="row mb-4"> 
                      <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker attendance_date" id="attendance_date"
                                name="attendance_date" value="{{ old('attendance_date') }}" placeholder="Select Attendance Date">
                            <label class="form-label" for="attendance_date"><span class="text-danger">*</span>Select Attendance Date</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form mb-4">
                            <label   ><span class="text-danger">*</span> Select Type</label>
                            <select class="form-control select2"   name="type"
                                aria-label="Floating label select example">
                                <option value="SELECT" selected>Select Type</option>
                                <option value="P" > Present</option>
                                <option value="A">Absent </option>
                                <option value="H">Holiday </option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Create Attendance Sheet " class="btn btn-outline-primary btn-sm  js-click-ripple-enabled" data-toggle="click-ripple">
                        </div>
                    </div>
                    
                   </div>
                   
                    </form>
                </div>
              </div>
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title"> Edit Attendance  </h3>
                   
                </div>
                <div class="block-content">
                     
             <form action="{{ route('edit_attandance') }}" method="GET">
                @csrf
                   <div class="row mb-4"> 
                      <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker attendance_date" id="date"
                                name="date" placeholder="Select Attendance Date From" autocomplete="off">
                            <label class="form-label" for="date"><span class="text-danger">*</span>Select Attendance Date  </label>
                        </div>
                    </div>
                   
                     <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Edit Attendance  " id="viewattandance" class="btn btn-outline-primary btn-sm  js-click-ripple-enabled" data-toggle="click-ripple">
                        </div>
                    </div>
                     
                    
                   </div>
             </form>
                   
                     
                </div>
              </div>
              <div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title"> View Attendance  </h3>
                   
                </div>
                <div class="block-content">
                     
             <form action="{{ route('view_attendance') }}" method="GET">
                @csrf
                   <div class="row mb-4"> 
                      <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker attendance_date" id="date_from"
                                name="date_from" placeholder="Select Attendance Date From" autocomplete="off">
                            <label class="form-label" for="date_from"><span class="text-danger">*</span>Select Attendance Date From</label>
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker attendance_date" id="date_to"  autocomplete="off"
                                name="date_to" placeholder="Select Attendance Date To">
                            <label class="form-label" for="date_to"><span class="text-danger">*</span>Select Attendance Date To</label>
                        </div>
                    </div>
                     <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="submit" value="View Attendance  " id="viewattandance" class="btn btn-outline-primary btn-sm  js-click-ripple-enabled" data-toggle="click-ripple">
                        </div>
                    </div>
                     
                    
                   </div>
             </form>
                   
                     
                </div>
              </div>
              
@endsection
@section('js')
  <script>
    $(document).ready(function(){
      // $(".attendance_date")change(function(){
      //   var adate=$(this).val();
      //   window.location.href="{{ route('attendance') }}";
      // });

      // $("#viewattandance").click(function(){ 
      //   var date_to =$("#date_to").val();
      //   var date_from =$("#date_from").val();
      //    window.location.href='{{ route('view_attendance',['date_from'=> '"+date_from+"','date_to'=>  '"+date_to+"']) }}';
      // });
    });
  </script>
@endsection