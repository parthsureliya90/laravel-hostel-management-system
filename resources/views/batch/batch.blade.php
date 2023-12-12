@extends('master')
@section('title',"Batch ")
@section('body')
 
<div class="block block-rounded">
                <div class="block-header block-header-default">
                  <h3 class="block-title">College List</h3>
                  <div class="block-options">
                    <a href="{{ route('add-batch') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm" data-toggle="click-ripple">
                      <i class="fa fa-plus opacity-50 me-1"></i> 
                      Add New</a> 
                  </div>
                </div>
                <div class="block-content">
                  @include('flash')
                  <table class="table table-hover table-bordered table-striped">
                <thead>
                  <tr>
                    <th >No.</th>
                    <th>Batch Name</th>
                    <th>No. of Students</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
               
                <tbody>
                @foreach ($data as $key=>$item)
                  <tr>
                   <td>{{ $data->firstItem() + $key }}</td>
                    <td>{{ $item->batch_name }}</td>
                    <td>{{ App\Models\Students::where('batch_id',$item->id)->count(); }}</td>
                    <td>
                      @if ($item->current_batch=='1')
                      <span class="badge bg-success">Current Batch</span>
                 
                    @endif
                  </td>

                    <td>
                      <div class="dropdown">
                    <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle" id="dropdown-default-outline-primary" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Actinos
                    </button>
                    <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-outline-primary">
                      <a class="dropdown-item" href="{{ route('edit-batch',['id'=>$item->id]) }}">Edit</a> 
                       
                    </div>
                  </div>
                    </td>
                  </tr>
                 
                @endforeach
                </tbody>
                 <tfoot>
                    <tr>
                    <th >No.</th>
                    <th>Batch Name</th>
                    <th>No. of Students</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
              </table>
              @include('paginate')
                </div>
              </div>
              
@endsection