@extends('master')
@section('title', 'Pending Fees Report')
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title"> Pending Fees Report</h3>

        </div>
        <div class="block-content">

            <x-table :columns="['No.', 'Student', 'Payable Fees', 'Duration', 'Fees Remaining', 'Fees Paid']" type='datatable'>
                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <a href="{{ route('fees_register_by_student', ['sid' => $item->id]) }}" target="_blank"
                                rel="noopener noreferrer">
                                {{ $item->fname . ' ' . $item->mname . ' ' . $item->lname }}
                            </a>
                        </td>

                        <td> &#x20B9; {{ number_format($item->payable_fees, 2) }}</td>
                        <td>{{ $item->fees_duration }} Months</td>
                        <td> &#x20B9; {{ number_format($item->remaining_amount, 2) }}</td>
                        <td> &#x20B9; {{ number_format($item->payable_fees - $item->remaining_amount, 2) }}</td>





                    </tr>
                @endforeach
            </x-table>

        </div>
    </div>

@endsection
@section('js')

    @include('datatables_js')
@endsection
