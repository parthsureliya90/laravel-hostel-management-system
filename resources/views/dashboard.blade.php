@extends('master')
@section('title', 'DashBoard')
@section('body')

    <div class="row">
        <!-- Row #5 -->
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('batch') }}">
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
            <a class="block block-rounded block-bordered block-link-shadow text-center" target="_blank"
                href="{{ route('college') }}">
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
            <a class="block block-rounded block-bordered block-link-shadow text-center" target="_blank"
                href="{{ route('students') }}">
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
            <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('attendance') }}">
                <div class="block-content">
                    <p class="my-3">
                        <i class="si si-equalizer fa-2x"></i>
                    </p>
                    <p class="fw-semibold">Attendence</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('fees_report') }}">
                <div class="block-content">
                    <p class="my-3">
                        <i class="si si-calculator fa-2x"></i>
                    </p>
                    <p class="fw-semibold">Fees</p>
                </div>
            </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
            <a class="block block-rounded block-bordered block-link-shadow text-center" href="{{ route('buildings') }}">
                <div class="block-content">
                    <p class="my-3">
                        <i class="si si-map fa-2x"></i>
                    </p>
                    <p class="fw-semibold">Hostel Buildings</p>
                </div>
            </a>
        </div>
        <!-- END Row #5 -->
    </div>
    <div class="row">
        <!-- Row #4 -->
        <div class="col-md-4">
            <div class="block block-rounded block-transparent bg-warning">
                <div class="block-content block-content-full">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="fa fa-exclamation-circle fa-4x text-warning-lighter"></i>
                        </div>
                        <div class="fs-4 fw-semibold text-white"> &#x20B9; {{ $toal_amount_expcnce }}</div>
                        <div class="text-white-75">Total Expences this Month</div>
                        <div class="pt-3">
                            <a class="btn btn-alt-warning" href="{{ route('expences') }}">
                                <i class="fa fa-exclamation-circle   me-1"></i> Manage
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="block block-rounded block-transparent bg-info">
                <div class="block-content block-content-full">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i class="fa fa-trophy fa-4x text-info-light"></i>
                        </div>
                        <div class="fs-4 fw-semibold text-white"> &#x20B9; {{ $toal_amount_income }}</div>
                        <div class="text-white-75">Total Income this Month</div>
                        <div class="pt-3">
                            <a class="btn btn-alt-info" href="{{ route('expences') }}">
                                <i class="fa fa-trophy opacity-50 me-1"></i> Manage
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="block block-rounded block-transparent bg-{{ $netprofit > 0 ? 'success' : 'danger' }}">
                <div class="block-content block-content-full">
                    <div class="py-3 text-center">
                        <div class="mb-3">
                            <i
                                class="fa fa-{{ $netprofit > 0 ? 'arrow-circle-up' : 'arrow-circle-down' }} fa-4x text-{{ $netprofit > 0 ? 'success' : 'danger' }}-light"></i>
                        </div>
                        <div class="fs-4 fw-semibold text-white"> &#x20B9; {{ $netprofit }}</div>
                        <div class="text-white-75">Total <strong>{{ $netprofit > 0 ? 'PROFIT' : 'LOSS' }}</strong> this
                            Month</div>
                        <div class="pt-3">
                            <a class="btn btn-alt-{{ $netprofit > 0 ? 'success' : 'danger' }}"
                                href="{{ route('expences') }}">
                                <i
                                    class="fa fa-{{ $netprofit > 0 ? 'arrow-circle-up' : 'arrow-circle-down' }} opacity-50 me-1"></i>
                                Manage
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- END Row #4 -->
    </div>
    <div class="row">
        <!-- Latest Orders -->
        <div class="col-xl-6">
            <div class="block block-rounded block-bordered">
                <div class="block-header">
                    <h3 class="block-title text-uppercase">Today's Fees collection</h3>

                </div>
                <div class="block-content block-content-full">
                    <table class="table table-borderless table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Receipt No.</th>
                                <th>Firm</th>
                                <th>Amount</th>
                                <th>Bank Pending</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>{{ $item->recipet_no }}</td>
                                    <td>
                                        @if ($item->firm == 'ARADHANA')
                                            <span class="badge rounded-pill bg-dark">ARADHANA</span>
                                        @else
                                            <span class="badge rounded-pill bg-success">GANDHIDHAM</span>
                                        @endif
                                    </td>
                                    <td> &#x20B9; {{ number_format($item->amount, 2) }}</td>


                                    <td>
                                        @if ($item->verified_with_bank == 'YES')
                                            <span class="badge rounded-pill bg-success">YES</span>
                                        @else
                                            <span class="badge rounded-pill bg-danger">NO</span>
                                        @endif
                                    </td>




                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="block block-rounded block-bordered">
                <div class="block-header">
                    <h3 class="block-title text-uppercase">Bank Verification Pending</h3>

                </div>
                <div class="block-content block-content-full">
                    <table class="table table-borderless table-striped mb-0">
                        <thead>
                            <tr>
                                <th style="width: 100px;">Receipt No.</th>
                                <th>Firm</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bank as $key => $item)
                                <tr>
                                    <td>{{ $item->recipet_no }}</td>
                                    <td>
                                        @if ($item->firm == 'ARADHANA')
                                            <span class="badge rounded-pill bg-dark">ARADHANA</span>
                                        @else
                                            <span class="badge rounded-pill bg-success">GANDHIDHAM</span>
                                        @endif
                                    </td>
                                    <td> &#x20B9; {{ number_format($item->amount, 2) }}</td>




                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END Latest Orders -->

        <!-- Top Products -->

        <!-- END Top Products -->
    </div>
@endsection
