@extends('master')
@section('title', 'Add New Expcence')
@section('body')

    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Add New Expcence

                </strong></h3>
            <div class="block-options">
                <a href="{{ route('expences') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    View Expences</a>
            </div>
        </div>
        <div class="block-content">
            @include('flash')



            <form action="{{ route('expence_save') }}" method="POST" autocomplete="off">
                @csrf

                <div class="row mb-4">
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm  " id="example-text-input-floating"
                                name="title" value="{{ old('title') }}" placeholder="Expence / Income Title">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Expence / Income Title</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm recipet_no"
                                id="example-text-input-floating" name="amount" value="{{ old('amount') }}"
                                placeholder=" Expence / Income  Amount">
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Expence / Income Amount</label>
                        </div>
                    </div>


                    <div class="col-3">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm datepicker"
                                id="example-text-input-floating" name="expence_date" value="{{ old('expence_date') }}"
                                placeholder="Enter  Expence / Income   Date" required>
                            <label class="form-label" for="example-text-input-floating"><span class="text-danger">*</span>
                                Expence / Income Date</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="mb-4">
                            <label class="form-label">Select Expence Or Income </label>
                            <div class="space-x-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="example-radios-inline1"
                                        name="type" value="INCOME" checked="">
                                    <label class="form-check-label" for="example-radios-inline1">INCOME</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="example-radios-inline2"
                                        name="type" value="EXPENCE" checked>
                                    <label class="form-check-label" for="example-radios-inline2">EXPENCE</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-sm  " id="example-text-input-floating"
                                name="remarks" value="{{ old('remarks') }}" placeholder="Bill No. / References / Others">
                            <label class="form-label" for="example-text-input-floating">
                                Remarks(Bill No. / References / Others)</label>
                        </div>
                    </div>




                    <div class="col-md-12 mt-0">
                        <div class="col-4">
                            <div class="form-floating mb-4">
                                <input type="submit" value="Save Expence"
                                    class="btn btn-outline-primary savefees btn-sm  js-click-ripple-enabled"
                                    data-toggle="click-ripple">
                            </div>
                        </div>
                    </div>

            </form>
        </div>
    </div>





@endsection
@section('js')

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
