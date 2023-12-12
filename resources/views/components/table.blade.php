@props(['type' => ''])

@php
    $tableType =
        [
            'datatable' => 'datatable',
            'normal' => '',
            '' => '',
        ][$type] ?? '';
@endphp
<table class="table table-hover table-bordered table-striped  " id="{{ $tableType }}">
    <thead>
        <tr>
            @foreach ($columns as $colum)
                <th>{{ $colum }}</th>
            @endforeach
        </tr>
    </thead>
    <tfoot>
        <tr>
            @foreach ($columns as $colum)
                <th>{{ $colum }}</th>
            @endforeach
        </tr>
    </tfoot>
    <tbody>

        {{ $slot }}

    </tbody>
</table>
