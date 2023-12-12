@extends('master')
@section('title', 'Add New College')
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New College </h3>
            <div class="block-options">
                <a href="{{ route('college') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    List College</a>
            </div>
        </div>
        <div class="block-content">
            @include('flash')
            <form action="{{ route('save-college') }}" method="POST"  >
                @csrf
                <div class="row mb-4">
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="college_name" value="{{ old('college_name') }}" placeholder="Enter College Name">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> College Name</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="location" value="{{ old('location') }}" placeholder="Enter College Location">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> College Location</label>
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
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> College Status</label>
                        </div>
                    </div>
                     <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Save College" class="btn btn-outline-primary btn-sm  js-click-ripple-enabled" data-toggle="click-ripple">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
