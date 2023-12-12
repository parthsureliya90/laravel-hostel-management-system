@extends('master')
@section('title', 'Students')
@section('body')

    <div class="block block-rounded">

        <div class="block-header block-header-default">
            <h3 class="block-title">
                Print ID Card
            </h3>


        </div>
        <div class="block-content">
            <select name="sid" id="sid" class="form-control select2">
                <option value="0">Select Student</option>
                @foreach ($data as $key => $item)
                    <option value="{{ $item->id }}">{{ $item->fname . ' ' . $item->mname . ' ' . $item->lname }}
                    </option>
                @endforeach
            </select>
            <br><br><br>
            <select name="name" id="name" class="form-control select2">
                <option value="0">Select Hostel Name</option>
                <option value="HOSTEL_ONE">Hostel One</option>
                <option value="HOSTEL_TWO">Hostel Two</option>
            </select>
        </div>
        <br><br><br>
    </div>
    <br>







@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#name').change(function() {
                var sid = $("#sid").val();
                var name = $(this).val();
                var url = "{{ url('/print-id-card/') }}" + "/" + sid + "/" + name
                window.open(url, '_blank');
            });
            // $('#sid').change(function() {
            //     var sid = $(this).val();
            //     var url = "{{ url('/print-id-card/') }}" + "/" + sid
            //     window.open(url, '_blank');
            // });
        });
    </script>
@endsection
