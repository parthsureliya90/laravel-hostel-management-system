@extends('master')
@section('title', 'Master Data')
@section('body')
    <div class="row">
        <!-- Row #5 -->
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-link-shadow text-center" href="{{ route('batch') }}">
                <div class="block-content ribbon ribbon-bookmark ribbon-warning ribbon-left">
                    <div class="ribbon-box">{{ App\Models\Batch::count() }}</div>
                    <p class="my-3">
                        <i class="si si-event fa-2x"></i>
                    </p>
                    <p class="fw-semibold">Batches</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-link-shadow text-center" target="_blank" href="{{ route('college') }}">
                <div class="block-content ribbon ribbon-bookmark ribbon-success ribbon-left">
                    <div class="ribbon-box">{{ App\Models\College::where('status', 'VISIBLE')->count() }}</div>
                    <p class="my-3">
                        <i class="si  si-notebook fa-2x"></i>
                    </p>
                    <p class="fw-semibold">College Master</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-link-shadow text-center" target="_blank" href="{{ route('students') }}">
                <div class="block-content ribbon ribbon-bookmark ribbon-info ribbon-left">
                    <div class="ribbon-box">{{ App\Models\Students::where('status', 'VISIBLE')->count() }}</div>
                    <p class="my-3">
                        <i class="si si-users fa-2x"></i>
                    </p>
                    <p class="fw-semibold">Students</p>
                </div>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-link-shadow text-center" href="{{ route('attendance') }}">
                <div class="block-content">
                    <p class="my-3">
                        <i class="si si-equalizer fa-2x"></i>
                    </p>
                    <p class="fw-semibold">Attendence</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-link-shadow text-center" href="{{ route('fees_report') }}">
                <div class="block-content">
                    <p class="my-3">
                        <i class="si si-calculator fa-2x"></i>
                    </p>
                    <p class="fw-semibold">Fees</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-link-shadow text-center" href=" ">
                <div class="block-content">
                    <p class="my-3">
                        <i class="si si-grid fa-2x"></i>
                    </p>
                    <p class="fw-semibold">Reports</p>
                </div>
            </a>
        </div>



        <!-- END Row #5 -->
    </div>
@endsection
