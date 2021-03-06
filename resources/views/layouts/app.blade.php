<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

@section('htmlheader')
    @include('layouts.partials.htmlheader')
@show

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="skin-blue sidebar-mini">
<script src="{{ asset('public/plugins/jQuery/jQuery-2.1.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/css/jquery-ui.css') }}"></script>
<script src="{{ asset('public/socket.io/socket.io.js') }}"></script>
<script src="{{ asset('public/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/jquery-migrate-1.4.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/jquery-ui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/tool.js') }}" type="text/javascript"></script>
<div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('layouts.partials.controlsidebar')

    {{--@include('layouts.partials.footer')--}}

</div><!-- ./wrapper -->

@section('scripts')
    @include('layouts.partials.scripts')
@show

</body>
</html>
