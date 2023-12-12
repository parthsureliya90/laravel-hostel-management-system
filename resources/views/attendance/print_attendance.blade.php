<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 <style>
    /* To print onto A4, landscape: 297mm X 210mm */
$page-width: 297mm;
$page-height: 210mm;
$page-margin: 10mm;
/* The number of lines in the table. (That would be the number of rows if 
there was only one line in each row. */
$no-of-lines: 52; 
$heading-height: 10mm;
/* Some correction is sometimes needed to adjust the height of lines to make 
sure the whole table fits on the page. */
$correction: 0.1mm; 

$line-height: 
  ($page-height - 2*$page-margin - $heading-height) 
  / $no-of-lines 
  - $correction;
  @media print {

    .btn-success{
        display: none;
    }
            @page {
    size: $page-width $page-height;
    margin: $page-margin;
  }
  .table {
    table-layout: fixed; /* makes the text-overflow function with percentage widths on the td or th */
    width: $page-width - 2*$page-margin;
    border-collapse: collapse;
    border-color: #000000 !important;
  }
   #button{
        display: none;
    }
      

 
        }

         .table {
     
    border-color: #000000 !important;
    
  }

 </style>
</head>
<body>
    <br>
    <button id="button"   class="btn btn-sm btn-success">Export     to EXCEL</button> 
     <br>
     <br>
    
                    
                  <table class="table table-hover table-bordered   " id="tblToExcl" style="100%">
                    <thead>
                        <tr>
                            <th colspan="{{ $end_day+1 }}" class="text-center"><h2>Attendance Report fo Month <strong>@php echo  $monthname = date("F", mktime(0, 0, 0, $month, 10))." ".$year; @endphp</strong>  </h2> </th>
                        </tr>
                         <tr>
                            <th colspan="{{ $end_day+1 }}" class="text-center"><h6>P =  PRESENT || A = ABSENT || H = HOLIDAY</h6> </th>
                        </tr>
                    </thead>
                        <?php $count=0; ?>
                             @for($i = 0; $i <count($total_students) +2; $i++)
                                    @if($i==0)
                                        <tr>
                                            <th rowspan="2" class="text-center" style="    vertical-align: middle;">Name</th>
                                            @for($x = $start_day; $x <= $end_day; $x++) 
                                                <th class=" text-center"> {{ $x }}   </th>  
                                            @endfor 
                                        </tr>
                                    @elseif($i==1)
                                        <tr> 
                                             
                                            @for($x = $start_day; $x <= $end_day; $x++) 
                                            @php $day=$x+1 . "-".$monthname."-".$year; $attendance_date=date('Y-m-d',strtotime($day)); @endphp
                                                 <th class=" text-center"> {{ date('D',strtotime($x."-".$month."-".$year)) }}   </th>
                                            @endfor 
                                        </tr>
                                    @else 
                                          <tr>
                                            <td style="    vertical-align: middle;"> {{ $total_students[$count]->fname }}   {{ $total_students[$count]->mname }}   {{ $total_students[$count]->lname }}</td>
                                            @for($j = $start_day-1; $j < $end_day; $j++)
                                                @php $day=$j+1 . "-".$month."-".$year; $attendance_date=date('Y-m-d',strtotime($day)); @endphp
                                                <td  class=" text-center  ">
                                                    @if(!empty($totalData[$attendance_date][$total_students[$count]->id]) && $totalData[$attendance_date][$total_students[$count]->id] =="A")
                                                        <span class="text-danger">{{$totalData[$attendance_date][$total_students[$count]->id]}}</span>
                                                    @elseif(!empty($totalData[$attendance_date][$total_students[$count]->id]) && $totalData[$attendance_date][$total_students[$count]->id] =="P") 
                                                        <span class="text-success">{{$totalData[$attendance_date][$total_students[$count]->id]}}</span>
                                                     @elseif(!empty($totalData[$attendance_date][$total_students[$count]->id]) && $totalData[$attendance_date][$total_students[$count]->id] =="H") 
                                                        <span class="text-warning">{{$totalData[$attendance_date][$total_students[$count]->id]}}</span>
                                                      @else
                                                        &nbsp;
                                                    @endif
                                                
                                                </td>
                                            @endfor
                                        </tr>
                                        <?php $count++; ?>
                                    @endif
                            @endfor
                        
                    
              </table>
              
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
              <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <script>
        $(document).ready(function() {
            function htmlTableToExcel(type){
 
}
            $("#button").click(function() {
              var data = document.getElementById('tblToExcl');
 var excelFile = XLSX.utils.table_to_book(data, {sheet: "sheet1"});
 XLSX.write(excelFile, { bookType: 'xlsx', bookSST: true, type: 'base64' });
 XLSX.writeFile(excelFile, 'ExportedFile:HTMLTableToExcel' + ".xlsx");
            });
        
        });
           </script>
</body>
</html>