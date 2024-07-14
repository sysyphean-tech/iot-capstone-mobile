@include('component.headerLogin')

<body>
    {{-- <script src="assets/static/js/initTheme.js"></script> --}}
    <div id="auth">

        <div class="row mt-5">
                <div class="container">
                @yield('container')

                <div class="col-lg-7 d-none d-lg-block">
                    <div id="auth-right">

                    </div>
                </div>
            </div>
        </div>

    </div>
</body>

</html>
