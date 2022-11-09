<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <title>
        Laravel
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-google.css') }}">
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ asset('assets/js/fontawesome-42d5adcbca.js') }}"></script>
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery.toast.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/chosen/component-chosen.css') }}">
    {{-- Datatable --}}
    <link href="{{ asset('assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">
    <link href="{{ asset('assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="{{ $class ?? '' }}">

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
            @include('components.fixed-plugin')
        @endif
    @endauth

    <!--   Core JS Files   -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery.toast.min.js') }}"></script>

    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/chosen/chosen.jquery.min.js') }}"></script>
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
        });
    </script>
    @stack('js');
    @yield('script')
</body>

</html>
