<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'DharmaHenwa') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    {{-- Animate --}}
    <link rel="stylesheet" href="{{asset('vendor/animatecss/animate.min.css')}}">

    {{-- DataTables --}}
    <link rel="stylesheet" href="{{asset('vendor/datatables/datatables.min.css')}}">

    {{-- Summernote --}}
    <link rel="stylesheet" href="{{asset('vendor/summernote/summernote-bs4.min.css')}}">

    {{-- Select 2 --}}
    <link rel="stylesheet" href="{{asset('vendor/select2/css/select2.min.css')}}">
</head>
<body id="page-top">

    <div id="wrapper">

        @include('administrator.components.sidebar')

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                @include('administrator.components.topbar')

                @yield('content')

            </div>

            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                    <span>Copyright &copy; {{ $_SERVER['HTTP_HOST'] }} {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
        </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('Sudah mau keluar?') }}</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">{{ __('Pilih "Keluar" untuk mengakhiri sesi sekarang') }}</div>

            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">{{__('form.cancel')}}</button>
                <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('form.logout') }} </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    {{-- Sweetalert --}}
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>

    {{-- DataTable --}}
    <script src="{{ asset('vendor/datatables/datatables.min.js') }}"></script>

    {{-- Summernote --}}
    <script src="{{ asset('vendor/summernote/summernote-bs4.min.js') }}"></script>

    {{-- Select 2 --}}
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    @stack('script')
</body>
</html>
