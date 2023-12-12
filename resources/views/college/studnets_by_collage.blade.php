@extends('master')
@section('title', 'Studnets in ' . $name)
@section('body')

    <div class="block block-rounded">
        <div class="block-header Buildings-header-default">
            <h3 class="block-title">Studnets in {{ $name }}</h3>
            <div class="block-options">
                <a href="{{ route('college') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-list opacity-50 me-1"></i>
                    List College</a>
            </div>
        </div>
        <div class="block-content">
            @include('flash')
            <x-table :columns="['No.', 'Student', 'Student Mobile', 'Father Mobile']" type='datatable'>


                @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ 1 + $key }}</td>
                        <td>
                            {{ $item->fname . ' ' . $item->mname . ' ' . $item->lname }}
                        </td>
                        <td>
                            {{ $item->student_contacts }}
                        </td>
                        <td> {{ $item->father_contacts }}</td>


                    </tr>
                @endforeach
            </x-table>
        </div>
    </div>

@endsection

@section('js')

    @include('datatables_js')
@endsection
