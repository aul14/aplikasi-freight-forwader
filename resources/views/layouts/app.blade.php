<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png"> --}}
    {{-- <link rel="icon" type="image/png" href="/img/favicon.png"> --}}
    <link rel="icon"
        href="{{ App\Models\Company::where('id', 1)->first()->image_company != null ? asset('storage/' . App\Models\Company::where('id', 1)->first()->image_company) : asset('img/favicon.png') }}">
    <title>
        WFreight
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-google.css?v=1.0.0') }}">
    <!-- Nucleo Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-icons.css?v=1.0.0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/nucleo-svg.css?v=1.0.0') }}" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.min.css?v=1.0.0') }}">
    <link href="{{ asset('assets/css/nucleo-svg.css?v=1.0.0') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" rel="stylesheet" href="{{ asset('assets/css/argon-dashboard.css?v=1.1.3') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css?v=1.2.2') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery.toast.min.css?v=1.0.0') }}">
    {{-- Bootstrap Select --}}
    <link rel="stylesheet" href="{{ asset('assets/css/select2.min.css?v=1.0.0') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap4-toggle.min.css?v=1.0.0') }}">
    <link rel="stylesheet" href="{{ asset('assets/chosen/component-chosen.css?v=1.0.0') }}">
    {{-- Datatable --}}
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css?v=1.0.0') }}"
        type="text/css">
    <link rel="stylesheet"
        href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css?v=1.0.0') }}"
        type="text/css">
    {{-- Datepicker --}}
    <link rel="stylesheet" href="{{ asset('assets/css/datepicker.min.css?v=1.0.0') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        let MAX_FIELD = 9999999;
    </script>
</head>
{{-- "g-sidenav-show dark-version bg-gray-600" --}}
@php
    $side_template = App\Models\WebTemplate::where('user_id', auth()->user() == null ? 0 : auth()->user()->id)->first() == null ? (object) ['sidebar_color' => '', 'sidebar_type' => '', 'mode' => ''] : App\Models\WebTemplate::where('user_id', auth()->user() == null ? 0 : auth()->user()->id)->first();
@endphp

<body
    class="{{ $side_template->mode == '' || $side_template->mode == 'light' ? $class : ($side_template->mode == 'dark' ? 'g-sidenav-show dark-version bg-gray-600' : '') }}">
    @guest
        @yield('content')
    @endguest

    @auth
        @if (in_array(request()->route()->getName(),
                ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password', 'rtl', 'virtual-reality']))
            @yield('content')
        @else
            <div class="min-height-300 bg-primary position-absolute w-100"></div>
            @include('layouts.navbars.auth.sidenav')
            <main class="main-content border-radius-lg">
                @yield('content')
            </main>
            @include('layouts.footers.auth.footer')
            @include('components.fixed-plugin')
        @endif
    @endauth

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.toast.min.js') }}"></script>
    {{-- Scrollbar --}}
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    {{-- Bootstrap Select --}}
    <script src="{{ asset('assets/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/chosen/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap4-toggle.min.js') }}"></script>
    {{-- Datepicker --}}
    <script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>

    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".chosen-select").chosen({
                width: "100%"
            });

            $('.date-picker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true
            });
            // setting dropdown di table responsive
            // hold onto the drop down menu                                             
            var dropdownMenu;

            // and when you show it, move it to the body                                     
            $(window).on('show.bs.dropdown', function(e) {

                // grab the menu        
                dropdownMenu = $(e.target).find('.cuk');

                // detach it and append it to the body
                $('body').append(dropdownMenu.detach());

                // grab the new offset position
                var eOffset = $(e.target).offset();

                // make sure to place it where it would normally go (this could be improved)
                dropdownMenu.css({
                    'display': 'block',
                    'top': eOffset.top + $(e.target).outerHeight(),
                    'center': eOffset.center
                });
            });

            // and when you hide it, reattach the drop down, and hide it normally                                                   
            $(window).on('hide.bs.dropdown', function(e) {
                $(e.target).append(dropdownMenu.detach());
                dropdownMenu.hide();
            });

            // uppercase in textarea
            $("textarea").keyup(function() {
                $(this).val($(this).val().toUpperCase());
            });
        });
    </script>
    @yield('script')
    @yield('sub_script_1')
    @yield('sub_script_2')
    @yield('sub_script_3')
    @yield('sub_script_4')
    @yield('sub_script_5')
</body>

</html>
