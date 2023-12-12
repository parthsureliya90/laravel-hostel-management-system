@extends('master')
@section('title',$title)
@section('body')
 
               
<div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">{!! $title !!}  </h3>
                  <a class="btn btn-sm btn-success" href="{{ route('print_attendance',["date_from"=>$date_from,"date_to"=>$date_to]) }}"  target="_blank">Print Report</a>
                  &nbsp;
                  <a class="btn btn-sm btn-info" href="{{ route('attendance' ) }}"   >Create New Attendance </a>
                </div>
                <div class="block-content  ">
                  @include('flash')
                   
                 <div class="table-responsive">
                  <table class="table table-hover table-bordered table- ">
                    
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
                                                <th class=" text-center"> {{ date('D',strtotime($x."-".$month."-".$year)) }}   </th>  
                                            @endfor 
                                        </tr>
                                    @else 
                                          <tr>
                                            <td style="    vertical-align: middle;""> {{ $total_students[$count]->fname }}   {{ $total_students[$count]->mname }}   {{ $total_students[$count]->lname }}</td>
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
      
                </div>
                </div>
              </div>
              
@endsection

 