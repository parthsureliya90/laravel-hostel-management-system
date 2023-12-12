@extends('master')
@section('title', $title)
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $title }}</h3>

        </div>
        <div class="block-content">



            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    <tr>
                        <td colspan="2"> <strong>{{ $title }} --
                                &#x20B9; {{ number_format($studentdata[0]->payable_fees, 2) }}</strong> /
                            <strong>
                                {{ $studentdata[0]->fees_duration }} Months</strong>
                        </td>
                    </tr>
                    <tr>
                        <th>Total Fees Paid / Remaining</th>
                        <th>&#x20B9; {{ $totalfees }} / {{ $remaining_amount }}</th>
                    </tr>
                    <tr>
                        <th>ARADHANA / <span class="text-success"> GANDHIDHAM</span></th>
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
@endsection
