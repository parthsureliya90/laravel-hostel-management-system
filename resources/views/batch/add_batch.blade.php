@extends('master')
@section('title', 'Add New Batch')
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New Batch </h3>
            <div class="block-options">
                <a href="{{ route('batch') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    List Batches</a>
            </div>
        </div>
        <div class="block-content">
            @include('flash')
            <form action="{{ route('save-batch') }}" method="POST"  >
                @csrf
                <div class="row mb-4">
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm" id="example-text-input-floating"
                                name="batch_name" value="{{ old('batch_name') }}" placeholder="Enter Batch Name">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Batch Name</label>
                        </div>
                    </div>

                  
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <select class="form-select" id="example-select-floating" name="current_batch"
                                aria-label="Floating label select example">
                                <option>Select Current Batch or Not</option>
                                <option value="1" selected>Current / Active Batch</option>
                                <option value="0">Other </option>
                            </select>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span> Batch Curernt / Other</label>
                        </div>
                    </div>
                     <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Save Batch" class="btn btn-outline-primary btn-sm  js-click-ripple-enabled" data-toggle="click-ripple">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>

@endsection
