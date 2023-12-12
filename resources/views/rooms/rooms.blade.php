@extends('master')
@section('title', 'Hostel Buildings Rooms')
@section('body')

    <div class="block block-rounded">
        <div class="block-header Buildings-header-default">
            <h3 class="block-title">Room List</h3>
            <div class="block-options">
                <a href="{{ route('add-rooms') }}" type="button" class="btn btn-outline-success me-1 mb-1 btn-sm"
                    data-toggle="click-ripple">
                    <i class="fa fa-plus opacity-50 me-1"></i>
                    Add New Room</a>
            </div>
        </div>
        <div class="block-content">
            @include('flash')
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Building Name</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No.</th>
                        <th>Building Name</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $data->firstItem() + $key }}</td>
                            <td>
                                {{ $item->building_name }}
                            </td>
                            <td><a href="{{ route('students-by-rooms', ['id' => $item->id]) }}"
                                    target="_blank">{{ $item->room_no }}</a></td>
                            <td>
                                @if ($item->status == 'VISIBLE')
                                    <span class="badge bg-success">VISIBLE</span>
                                @else
                                    <span class="badge bg-danger">HIDDEN</span>
                                @endif
                            </td>

                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle"
                                        id="dropdown-default-outline-primary" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Actinos
                                    </button>
                                    <div class="dropdown-menu fs-sm" aria-labelledby="dropdown-default-outline-primary">
                                        <a class="dropdown-item"
                                            href="{{ route('edit-rooms', ['id' => $item->id]) }}">Edit</a>
                                        @if ($item->status == 'VISIBLE')
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item bg-danger text-white"
                                                href="{{ route('status-rooms', ['status' => 'HIDDEN', 'id' => $item->id]) }}">Mark
                                                as Hidden</a>
                                        @else
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item bg-success text-white"
                                                href="{{ route('status-rooms', ['status' => 'VISIBLE', 'id' => $item->id]) }}">Mark
                                                as Visible</a>
                                        @endif

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            @include('paginate')
        </div>
    </div>

@endsection
