@extends('master')
@section('title', 'Students')
@section('body')

    <div class="block block-rounded">

        <div class="block-header block-header-default">
            <h3 class="block-title">
                <input type="text" class="form-control" id="search"
                    placeholder="Search Student here by NAME / FATHER NAME / SURNAME / MOBILE NO ">
            </h3>

            <div class="block-options">
                <a type="button" class="btn btn-outline-danger me-1 mb-1 btn-sm clearsearch" href="javascript:void(0);"> <i
                        class="fa fa-close opacity-50 me-1"></i> Clear Search </a>
                <a type="button" class="btn btn-outline-success me-1 mb-1 btn-sm" data-toggle="click-ripple"
                    href="{{ route('add-student') }}"> <i class="fa fa-plus opacity-50 me-1"></i> Add New</a>
            </div>
        </div>

    </div>

    <div class="loading">

    </div>
    <div class="row searchenable">
        @foreach ($data as $key => $item)
            <div class="col-12 col-md-3 col-lg-3 col-sm-4 col-xs-6" style="padding: 10px">

                <a class="  text-center" href="{{ route('edit-student', ['id' => $item->id]) }}" target="_blank">
                    <div class="block-content block-content-full block-content-sm bg-success text-white">
                        <div class="fw-semibold">BATCH : {{ $item->batch_name }}</div>
                    </div>
                    <div class="block-content block-content-full bg-body-light">

                        <img class="img-avatar" src="{{ config('app.URL') }}students/{{ $item->photo }}" alt="">
                    </div>
                </a>

                <div class="block-content block-content-full bg-body-light">
                    <div class="fw-semibold ">
                        <a class="  text-center" href="{{ route('edit-student', ['id' => $item->id]) }}"
                            target="_blank">{{ $item->fname . ' ' . $item->mname . ' ' . $item->lname }}
                        </a>
                    </div>
                    <div class="fs-sm text-muted">Student's : {{ $item->student_contacts }}</div>
                    <div class="fs-sm text-muted">Father's : {{ $item->father_contacts }}</div>
                    <a class="btn btn-sm btn-outline-dark "
                        href="{{ route('fees_pay', ['id' => $item->id, 'type' => 'INSTALLMENT']) }}" target="_blank">Fees
                        Pay
                    </a>
                </div>




            </div>
        @endforeach
    </div>

    <div class="block block-rounded  searchenable ">


        @include('paginate')
    </div>




    <div class="row search_resutlt">



    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $(".loading").hide();
            $(".search_resutlt").hide();
            $("#search").keyup(function() {
                var search = $(this).val();

                if (search.length > 2) {
                    $(".searchenable").hide();
                    $(".loading").show();
                    $(".loading").html(
                        '  <div class="alert alert-info"><i class="fa-solid fa-spinner fa-spin fa-2xl"></i><strong> Please Wait Searching......</strong></div>'
                    );

                    $.ajax({
                        url: "{{ route('search') }}",
                        type: "POST",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'search': search
                        },
                        success: function(data) {
                            var jsondata = JSON.parse(data);
                            if (jsondata.status == '1') {
                                $(".search_resutlt").show();
                                $(".loading").hide();
                                $('.search_resutlt').html(jsondata.body);
                            } else {
                                $(".search_resutlt").hide();
                                $(".loading").show();
                                $(".loading").html(
                                    '  <div class="alert alert-info"><i class="fa-solid fa-exclamation fa-2xl"></i> <strong> No Students Found </strong></div>'
                                );
                            }

                        }
                    });


                }
            });

            $(".clearsearch").click(function() {
                $(".search_resutlt").hide();
                $(".searchenable").show();
                var search = $("#search").val('')
            });
        });
    </script>
@endsection
