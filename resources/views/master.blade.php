<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<title>@yield('title') | {{ config('app.name') }}</title>

<meta name="robots" content="noindex, nofollow">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Icons -->
<!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
<link rel="shortcut icon" href="{{ config('app.URL') }}assets/media/favicons/favicon.png">


<!-- Stylesheets -->
<!-- Codebase framework -->
<link rel="stylesheet" id="css-main" href="{{ config('app.URL') }}assets/css/codebase.min.css">
<link rel="stylesheet" id="css-main" href="{{ config('app.URL') }}assets/js/plugins/select2/css/select2.min.css">

<link rel="stylesheet"
    href="{{ config('app.URL') }}assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css">

<link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" id="app-style" rel="stylesheet"
    type="text/css">


<!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
<!-- <link rel="stylesheet" id="css-theme" href="{{ config('app.URL') }}assets/css/themes/flat.min.css"> -->
<!-- END Stylesheets -->
<style>
    .table>:not(caption)>*>* {
        padding: 5px 4px;
        background-color: var(--bs-table-bg);
        border-bottom-width: 1px;
        box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
    }
</style>
</head>

<body>

    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content">


        @include('sidebar')
        @include('header')
        <main id="main-container">
            <div class="content">
                @yield('body')
            </div>
        </main>

        <footer id="page-footer">
            <div class="content py-3  bg-light">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Powered by <a class="fw-semibold" href="https://parthsureliya.in" target="_blank">Parth
                            Sureliya</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://shivaywebsolution.com"
                            target="_blank">{{ config('app.name') }}</a> &copy; <span>{{ date('Y') }}</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!--
        Codebase JS

        Core libraries and functionality
        webpack is putting everything together at {{ config('app.URL') }}assets/_js/main/app.js
    -->
    <script src="{{ config('app.URL') }}assets/js/lib/jquery.min.js"></script>
    <script src="{{ config('app.URL') }}assets/js/plugins/select2/js/select2.full.min.js"></script>
    <script src="{{ config('app.URL') }}assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ config('app.URL') }}assets/js/codebase.app.min.js"></script>
    <script>
        Codebase.helpersOnLoad(['js-flatpickr']);
    </script>
    <script>
        $(document).ready(function() {
            $(".select2").select2();
            $('.datepicker').datepicker({
                format: "yyyy-mm-dd",
                // maxViewMode: 0,
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true,
                //  startDate:  new Date(Date.now() - 172800000)
            });
        });
    </script>

    @yield('js')
</body>

</html>
