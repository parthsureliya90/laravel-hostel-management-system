@extends('master')
@section('title', 'Edit Hostel Room')
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Edit Room </h3>
            <div class="block-options">
                <a href="{{ route('rooms') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    List Hostel Room</a>
            </div>
        </div>
        <div class="block-content">
            @include('flash')
            <form action="{{ route('update-rooms') }}" method="POST"  >
                <input type="hidden" value="{{$data->id}}" name="id">
                @csrf
                <div class="row mb-4">
                     <div class="col-4">
                        <div class="form-group mb-4"> 
                            <label class="form-label" for="example-text-input-floating">Select Hostel Building </label>
                            <select class="form-control select2" id="example-select-floating" name="building">
                                <option>Select Building</option>
                                   @foreach ($buildings as $item)
                                       <option value="{{ $item->id }}" {{ ($data->building_id ==  $item->id)?'selected':'' }}>{{ $item->building_name }}</option>
                                   @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="room_no" value="{{ $data->room_no }}" placeholder="Enter Room No">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Room No</label>
                        </div>
                    </div> 
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <select class="form-select" id="example-select-floating" name="status"
                                aria-label="Floating label select example">
                                <option>Select Status</option>
                                <option value="VISIBLE" {{  ($data->status == "VISIBLE")?'selected':'' }}>VISIBLE</option>
                                <option value="HIDDEN" {{  ($data->status == "HIDDEN")?'selected':'' }}>HIDDEN</option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Building Status</label>
                        </div>
                    </div>
                     <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Update Room " class="btn btn-outline-primary btn-sm  js-click-ripple-enabled" data-toggle="click-ripple">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
