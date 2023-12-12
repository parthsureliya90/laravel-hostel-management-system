@extends('master')
@section('title',$title)
@section('body')
 
               
<div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">{!! $title !!}  </h3>
                    <a class="btn btn-sm btn-warning" href="{{ route('attendance' ) }}"   >Create New Attendance </a>&nbsp;
                   <a class="btn btn-sm btn-success" href="{{ route('print_attendance',["date_from"=>$date_from,"date_to"=>$date_to]) }}"  target="_blank">Print Report</a>&nbsp;
                    
                
                   <button class="btn btn-info save btn-sm update" id=" ">
                            <span class="fa fa-save"></span> Save Attendance
                        </button>
                </div>
                <div class="block-content  ">
                   <div class="error"></div>
                  
                   <input type="hidden" name="attendance_date" id="attendance_date" class="attendance_date" value="{{ $attendance_date }}">
                 <div class="table-responsive">
                  <table class="table table-hover table-bordered table- ">
                    
                         <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Type</th>
                            </tr>
                         </thead>
                        <tbody> 
                            @foreach ($attData as $key=>$item) 
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->fname." ". $item->lname }}</td>
                                <td>
                                    <select name="att_type" class="form-control att_type" id="att_type"  data_id="{{$item->id}}"  data_sid="{{$item->sid}}">
                                        <option value="A" {{ ($item->type == "A")?'selected':'' }}>A - Absent</option>
                                        <option value="P" {{ ($item->type == "P")?'selected':'' }}>P - Present</option>
                                        <option value="H" {{ ($item->type == "H")?'selected':'' }}>H - Holiday</option>

                                   
                                    </select>
                                </td>
                            </tr> 
                            @endforeach
                        </tbody>

                         
                         <tfoot>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Type</th>
                            </tr>
                         </tfoot>
                        
                    
              </table>
      
                </div>
                </div>

                 <div class="block-header block-header-default">
                  <h3 class="block-title">{!! $title !!}  </h3>
                 
                  <a class="btn btn-sm btn-warning" href="{{ route('attendance' ) }}"   >Create New Attendance </a>   &nbsp;
                         <a class="btn btn-sm btn-success" href="{{ route('print_attendance',["date_from"=>$date_from,"date_to"=>$date_to]) }}"  target="_blank">Print Report</a>
                         &nbsp;
                   <button class="btn btn-info save btn-sm update" id=" ">
                            <span class="fa fa-save"></span> Save Attendance
                        </button>
                </div>
              </div>
              
@endsection
@section('js')
    <script>
        $(document).ready(function () {
    var globalarray = [];

    $(".update").click(function () {
//Getting values of all select box
        var data_att = [];
        var data_att_cnv = [];
        $(".att_type").each(function () {
            var id = $(this).attr("data_id");//attendance id
            // var sid = $(this).attr("data_sid");
            var attvalue = $(this).val();
            data_att.push({'attvalue': attvalue,   'id': id});
        });
       $('.update').prop('disabled', false);
 
        //Getting values of all select box
        var data_att_cnv = JSON.stringify(data_att); // convert array into json format
        globalarray = data_att_cnv;
        var attendance_date = $("#attendance_date").val();
        if (!attendance_date) {
            $('.error').html("<div class='alert alert-danger'> Please Select Date First !</div>").show().fadeIn(400).delay(3000).fadeOut(400).scrollTop();
            return false;
        } 
        $(".error").html("<div class='alert alert-info'>Please Wait...</div>");
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ route('update_attandance') }}",
            data: {action: "Add_Attendance", attendance_date: attendance_date, data: globalarray},
            type: "post",
            dataType: 'json',
            beforeSend: function () {
                $('.update').prop('disabled', true);
            },
            complete: function () {
                $('.update').prop('disabled', true);
            },
            success: function (data) {
               
                if (data.status == 0) {
                $('.update').removeAttr('disabled');
                    $('.error').html("<div class='alert alert-danger'>" + data.msg + "</div>").show().fadeIn(400).delay(3000).fadeOut(400);
                } else if (data.status == 1) {
                    location.reload();
                $('.update').removeAttr('disabled');
                    $('.error').html("<div class='alert alert-success'>" + data.msg + "</div>").show().fadeIn(400).delay(5000).fadeOut(400);
                }
            }
        });
    });
    $("#successmsg").hide();
    
});
    
    </script>
@endsection