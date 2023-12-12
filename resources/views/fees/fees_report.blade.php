@extends('master')
@section('title', $title)
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $title }}</h3>

        </div>
        <div class="block-content">
            <form action="{{ route('fees_report') }}" method="GET" autocomplete="off">
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker"
                                id="example-text-input-floating" name="date_from" placeholder="Select Date From" required>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Date From</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker"
                                id="example-text-input-floating" name="date_to" placeholder="Select Date To" required>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Date To</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 mt-0">
                    <div class="col-4">
                        <div class="form-floating mb-4">
                            <input type="submit" value="Generate Report"
                                class="btn btn-outline-primary savefees btn-sm  js-click-ripple-enabled"
                                data-toggle="click-ripple">
                        </div>
                    </div>
                </div>
            </form>

            @if (!empty($date_from) && !empty($date_to) && $date_from != '01-01-1970')
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <td colspan="2">From : <strong>{{ $date_from }}</strong> To :
                                <strong> {{ $date_to }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Fees Collected</th>
                            <th>&#x20B9; {{ $totalfees }}</th>
                        </tr>
                        <tr>
                            <th>TYPEONE / <span class="text-success"> TYPE_TWO</span></th>
                            <th>&#x20B9; {{ $totalfees_aradhana }} / <span
                                    class="text-success">&#x20B9;{{ $totalfees_gandhidham }}</span></th>
                        </tr>

                        <tr>
                            <th> Bank Verfication <span class="text-danger">Pending</span> / <span
                                    class="text-success">Verified</span> </th>
                            <th><span class="text-danger">&#x20B9; {{ $totalfees_bank_verified }}</span> /
                                <span class="text-success">&#x20B9; {{ $totalfees_bank_verified_YES }}</span>
                            </th>
                        </tr>

                    </tbody>
                </table>
                <x-table :columns="[
                    'Receipt No.',
                    'Student',
                    'Firm',
                    'Amount',
                    'Paid Date',
                    'Type',
                    'Bank',
                    'Remarks',
                    'Created On',
                    'Actions',
                ]" type='datatable'>
                    @foreach ($feesdata as $key => $item)
                        <tr>
                            <td>{{ $item->recipet_no }}</td>
                            <td>{{ $item->fname . ' ' . $item->mname . ' ' . $item->lname }}</td>
                            <td>
                                @if ($item->firm == 'ARADHANA')
                                    <span class="badge rounded-pill bg-dark">TYPE_ONE</span>
                                @else
                                    <span class="badge rounded-pill bg-success">TYPE_TWO</span>
                                @endif
                            </td>
                            <td> &#x20B9; {{ number_format($item->amount, 2) }}</td>
                            <td>
                                @if (!empty($item->paid_date))
                                    {{ Carbon\Carbon::parse($item->paid_date)->format('d-m-Y ') }}
                                @endif
                            </td>
                            <td>
                                @if ($item->fees_type == 'JOINING')
                                    <span class="badge rounded-pill bg-warning">JOINING</span>
                                @else
                                    <span class="badge rounded-pill bg-primary">INSTALLMENT</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->verified_with_bank == 'YES')
                                    <span class="badge rounded-pill bg-success">YES</span>
                                @else
                                    <span class="badge rounded-pill bg-danger">NO</span>
                                @endif
                            </td>

                            <td>{{ $item->remarks ?? '-' }}</td>


                            <td>
                                @if (!empty($item->created_at))
                                    {{ Carbon\Carbon::parse($item->created_at)->format('d-m-Y ') }}
                                @endif
                            </td>
                            <td>

                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-primary btn-sm dropdown-toggle"
                                        id="dropdown-default-outline-primary" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-outline-primary">

                                        @if ($item->verified_with_bank == 'YES')
                                            <a class="dropdown-item text-warning"
                                                href="{{ route('bank_verified', ['id' => $item->id, 'type' => 'NO']) }}">Unverified
                                                Bank</a>
                                            <div class="dropdown-divider"></div>
                                        @else
                                            <a class="dropdown-item text-success"
                                                href="{{ route('bank_verified', ['id' => $item->id, 'type' => 'YES']) }}">Verified
                                                Bank</a>
                                            <div class="dropdown-divider"></div>
                                        @endif

                                        <a class="dropdown-item  " target="_blank"
                                            href="{{ route('print_recipt', ['sid' => $item->sid, 'frid' => $item->id, 'firm' => $item->firm]) }}">Print
                                            Receipt</a>
                                        <div class="dropdown-divider"></div>

                                        <a class="dropdown-item bg-danger text-white"
                                            onclick="return confirm('Are you sure to remove this fess?')"
                                            href="{{ route('remove_fees', ['id' => $item->id, 'sid' => $item->sid]) }}">Remove
                                            Fees?</a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </x-table>

            @endif
        </div>
    </div>

@endsection
@section('js')

    @include('datatables_js')
@endsection
