@extends('master')
@section('title', $title)
@section('body')<table class="table table-bordered text-center  bg-white">
        <thead>
            <tr>
                <th>Total Fees</th>
                <th>Paid Fees</th>
                <th>Remaning Fees</th>
            </tr>
        </thead>
        <tr>
            <td> &#x20B9; {{ $total_fees_to_be_paid }}</td>
            <td>
                @if ($payable_fees > 0)
                    &#x20B9;
                    {{ $paid_fees_amount }}
                @else
                    Full Amount is Paid
                @endif
            </td>
            <td> &#x20B9; {{ $remaining_amount }}</td>
        </tr>
    </table>

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Pay Fees for <strong>{{ $title }}

                </strong></h3>
            <div class="block-options">
                {{-- <a href="{{ route('college') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    Pay Fees</a> --}}
            </div>
        </div>
        <div class="block-content">
            @include('flash')



            @if ($payable_fees > 0)
                <form action="{{ route('save_fees_pay') }}" method="POST" autocomplete="off">
                    @csrf
                    <input type="hidden" name="sid" value="{{ $sid }}">
                    <input type="hidden" name="recipet_no" value="{{ $recipet_no }}">
                    <input type="hidden" name="batch_id" value="{{ $batch_id }}">
                    <div class="row mb-4">
                        <div class="col-2">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-sm recipet_no"
                                    id="example-text-input-floating" name="recipet_no" value="{{ $recipet_no }}"
                                    placeholder=" Payable Fees" disabled>
                                <label class="form-label" for="example-text-input-floating"><span
                                        class="text-danger">*</span>
                                    Receipt No.</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-floating mb-4">
                                <select class="form-select" id="example-select-floating" name="fees_type"
                                    aria-label="Floating label select example">
                                    <option>Select Fees Type</option>
                                    <option value="JOINING" {{ $type == 'JOINING' ? 'selected' : '' }}>JOINING Fees</option>
                                    <option value="INSTALLMENT" {{ $type == 'INSTALLMENT' ? 'selected' : '' }}>INSTALLMENT
                                        Fees
                                    </option>
                                </select>
                                <label class="form-label" for="example-text-input-floating"><span
                                        class="text-danger">*</span>
                                    Fees Type</label>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-sm payable_fees"
                                    id="example-text-input-floating" name="payable_fees" value="{{ $payable_fees }}"
                                    placeholder=" Payable Fees">
                                <label class="form-label" for="example-text-input-floating"><span
                                        class="text-danger">*</span>
                                    Remaining Fees</label>
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-floating mb-4">
                                <input type="number" class="form-control form-control-sm paying_amount"
                                    id="example-text-input-floating" name="paying_amount"
                                    value="{{ old('paying_amount') }}" placeholder="Enter Paying Amount" required>
                                <label class="form-label" for="example-text-input-floating"><span
                                        class="text-danger">*</span>
                                    Paying Amount</label>
                            </div>
                        </div>


                        <div class="col-3">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-sm datepicker"
                                    id="example-text-input-floating" name="paid_date" value="{{ old('paid_date') }}"
                                    placeholder="Enter Paid Date" required>
                                <label class="form-label" for="example-text-input-floating"><span
                                        class="text-danger">*</span>
                                    Fees Paid Date</label>
                            </div>
                        </div>


                        <div class="col-2">
                            <div class="mb-4">
                                <label class="form-label">Fees Veified with
                                    Bank?</label>
                                <div class="space-x-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="example-radios-inline1"
                                            name="verified_with_bank" value="YES" checked="">
                                        <label class="form-check-label" for="example-radios-inline1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="example-radios-inline2"
                                            name="verified_with_bank" value="NO" checked>
                                        <label class="form-check-label" for="example-radios-inline2">NO</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="mb-4">
                                <label class="form-label">Full Fees is Paid </label>
                                <div class="space-x-2">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="example-radios-inline1"
                                            name="full_fees_paid" value="YES" checked="">
                                        <label class="form-check-label" for="example-radios-inline1">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="example-radios-inline2"
                                            name="full_fees_paid" value="NO" checked>
                                        <label class="form-check-label" for="example-radios-inline2">NO</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-floating mb-4">
                                <select class="form-select" id="example-select-floating" name="firm"
                                    aria-label="Floating label select example" required>
                                    <option value="">Select Firm</option>
                                    <option value="ARADHANA">ARADHANA</option>
                                    <option value="GANDHIDHAM">GANDHIDHAM</option>
                                </select>
                                <label class="form-label" for="example-text-input-floating"><span
                                        class="text-danger">*</span>
                                    Select Firm</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control form-control-sm  "
                                    id="example-text-input-floating" name="remarks" value="{{ old('remarks') }}"
                                    placeholder="Enter Remarks / UPI Transaction NO / CHEQUE NO-DETAILS">
                                <label class="form-label" for="example-text-input-floating">
                                    Enter Remarks / UPI Transaction NO / CHEQUE NO-DETAILS</label>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-12 mt-0">
                        <div class="col-4">
                            <div class="form-floating mb-4">
                                <input type="submit" value="Save {{ $type }} Fees"
                                    class="btn btn-outline-primary savefees btn-sm  js-click-ripple-enabled"
                                    data-toggle="click-ripple">
                            </div>
                        </div>
                    </div>

                </form>
            @endif
        </div>
    </div>



    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Fee Paid by : {{ $title }}</span>
                </strong></h3>
            <div class="block-options">
                {{-- <a href="{{ route('college') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-print opacity-50 me-1"></i>
                    Print Recipt (GANDHIDHAM)</a>
                <a href="{{ route('college') }}" type="button" class="btn btn-outline-primary me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-print opacity-50 me-1"></i>
                    Print Recipt (ARADHANA)</a> --}}
            </div>
        </div>
        <div class="block-content">
            <x-table :columns="[
                'Receipt No.',
                'Firm',
                'Amount',
                'Paid Date',
                'Type',
                'Bank',
                'Remarks',
                'Created On',
                'Actions',
            ]" type='datatable'>
                @foreach ($fees_register as $key => $item)
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
        </div>
    </div>


@endsection
@section('js')

    @include('datatables_js')
    {{-- <script>
        $(document).ready(function() {
            $(".savefees").click(function() {
                var paying_amount = $(this).val();

                var payable_fees = $(".payable_fees").val();

                if (paying_amount < payable_fees) {
                    alert("Paying Amount can not be greater than Payble Fees")
                }
            });
        });
    </script> --}}
@endsection
