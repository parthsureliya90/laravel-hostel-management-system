@extends('master')
@section('title', 'Room List With Students')
@section('body')

    <div class="block block-rounded">
        <div class="block-header Buildings-header-default">
            <h3 class="block-title">Room List With Students</h3>
            <div class="block-options">
                <a href="{{ route('rooms') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    List Room</a>
            </div>
        </div>
        <div class="block-content">
            @include('flash')
            <x-table :columns="['No.', 'Student', 'Building Name', 'Room No.']" type='datatable'>


                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ 1 + $key }}</td>
                        <td>
                            {{ $item->fname . ' ' . $item->mname . ' ' . $item->lname }}
                        </td>
                        <td>
                            {{ $item->building_name }}
                        </td>
                        <td> {{ $item->room_no }}</td>


                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>

@endsection

@section('js')

    @include('datatables_js')
@endsection
