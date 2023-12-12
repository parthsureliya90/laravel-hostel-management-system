@extends('master')
@section('title', 'Hostel Expences')
@section('body')

    <div class="block block-rounded">
        <div class="block-header Buildings-header-default">
            <h3 class="block-title">Expences List</h3>
            <div class="block-options">
                <a href="{{ route('expence_create') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-plus opacity-50 me-1"></i>
                    Add New</a>
            </div>
        </div>
        <div class="block-content">

            @include('flash')
            <form action="{{ route('expences') }}" method="GET" autocomplete="off">
                <div class="row">
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker"
                                id="example-text-input-floating" name="date_from" placeholder="Select Date From"
                                value="{{ $date_from }}" required>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Date From</label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker"
                                id="example-text-input-floating" name="date_to" placeholder="Select Date To" required
                                value="{{ $date_to }}">
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

            <h3>
                Total Expcence From {{ date('d-m-Y', strtotime($date_from)) }} To Date :
                {{ date('d-m-Y', strtotime($date_to)) }}
            </h3>
            <div class="row">
                <div class="col-6">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th class="bg-warning text-white"> &#x20B9; {{ $toal_amount_expcnce }}</th>
                                <th class="bg-info text-white"> &#x20B9; {{ $toal_amount_income }}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-6">
                    <table class="table table-bordered text-center">
                        <thead>
                            <tr>
                                <th colspan="2" class="{{ $netprofit > 0 ? 'bg-success' : 'bg-danger' }} text-white">
                                    {{ $netprofit > 0 ? 'PROFIT' : 'LOSS' }} : &#x20B9; {{ $netprofit }}
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <x-table :columns="['No.', 'Title', 'Date', 'EXPENCE', 'INCOME', 'Remarks', 'Actions']" type='datatable'>



                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ 1 + $key }}</td>
                        <td>{{ $item->title }}</td>
                        <td>{{ date('d-m-Y', strtotime($item->trans_date)) }}</td>
                        <td>
                            @if ($item->type == 'EXPENCE')
                                &#x20B9; {{ number_format($item->amount, 2) }}
                            @endif
                        </td>
                        <td>
                            @if ($item->type == 'INCOME')
                                &#x20B9; {{ number_format($item->amount, 2) }}
                            @endif
                        </td>
                        <td>{{ $item->remarks }}</td>


                        <td>
                            <a href="{{ route('destroy_expence', ['id' => $item->id]) }}"
                                onclick="return confirm('Are you sure to remove this expence?')"
                                class="btn btn-sm btn-danger">Remove</a>
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
