@extends('master')
@section('title',"Students")
@section('body')
 
<div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">Student's List</h3>
                  <div class="block-options">
                    <a type="button" class="btn btn-outline-success me-1 mb-1 btn-sm" data-toggle="click-ripple" href="{{ route('add-student') }}">  <i class="fa fa-plus opacity-50 me-1"></i>  Add New</a> 
                  </div>
                </div>
                <div class="block-content">
                  <table class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th >No.</th>
                    <th>Name</th>
                    <th >Father </th>
                    <th >Students </th>
                    <th >Emergency</th>
                    <th >Status</th>
                    <th >Action</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($data as $key=>$item)
                  <tr>
                     <td>{{ $data->firstItem() + $key }}</td>
                     <td>{{ $item->fname." ".$item->mname." ".$item->lname}}</td>
                     <td><a href="tel:{{ $item->father_contacts}}">{{ $item->father_contacts}}</a></td>
                     <td><a href="tel:{{ $item->student_contacts}}">{{ $item->student_contacts}}</a></td>
                     <td><a href="tel:{{ $item->emg_contacts}}">{{ $item->emg_contacts}}</a></td> 
                       <td>
                      @if ($item->status=='VISIBLE')
                      <span class="badge bg-success">VISIBLE</span>
                    @else
                      <span class="badge bg-danger">HIDDEN</span>
                    @endif
                  </td>
                   <td>
                      <div class="dropdown">
                    <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle" id="dropdown-default-outline-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actinos
                    </button>
                    <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-outline-primary">
                      <a class="dropdown-item" href="{{ route('edit-student',['id'=>$item->id]) }}">Edit</a> 
                        @if ($item->status=='VISIBLE')
                     <div class="dropdown-divider"></div>
                      <a class="dropdown-item bg-danger text-white" href="{{ route('status-college',['status'=>"HIDDEN",'id'=>$item->id]) }}">Mark as Hidden</a>
                    @else
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item bg-success text-white" href="{{ route('status-college',['status'=>"VISIBLE",'id'=>$item->id]) }}" >Mark as Visible</a>
                    @endif
                      
                    </div>
                  </div>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
              @include('paginate')
                </div>
              </div>
@endsection