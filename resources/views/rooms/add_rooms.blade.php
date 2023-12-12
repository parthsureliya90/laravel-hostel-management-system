@extends('master')
@section('title', 'Add New Hostel Room')
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New College </h3>
            <div class="block-options">
                <a href="{{ route('rooms') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    List Hostel Room</a>
            </div>
        </div>
        <div class="block-content">
            @include('flash')
            <form action="{{ route('save-rooms') }}" method="POST"  >
                @csrf
                <div class="row mb-4">
                     <div class="col-4">
                        <div class="form-group mb-4"> 
                            <label class="form-label" for="example-text-input-floating">Select College </label>
                            <select class="form-control select2" id="example-select-floating" name="building"
                                aria-label="floating label select example">
                                <option>Select Building</option>
                                   @foreach ($buildings as $item)
                                       <option value="{{ $item->id }}" {{ (old('building') ==  $item->id)?'selected':'' }}>{{ $item->building_name }}</option>
                                   @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="room_no" value="{{ old('room_no') }}" placeholder="Enter Room No">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Room No</label>
                        </div>
                    </div> 
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <select class="form-select" id="example-select-floating" name="status"
                                aria-label="Floating label select example">
                                <option>Select Status</option>
                                <option value="VISIBLE" selected>VISIBLE</option>
                                <option value="HIDDEN">HIDDEN</option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Building Status</label>
                        </div>
                    </div>
                     <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Save Room " class="btn btn-outline-primary btn-sm  js-click-ripple-enabled" data-toggle="click-ripple">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
