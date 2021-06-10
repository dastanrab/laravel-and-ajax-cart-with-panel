<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('داشبورد') }}
        </h2>
    </x-slot>

    <div class="col-12 py-12">
        <html>
        <head>
            <title>@yield('title')</title>

            <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            <link rel="stylesheet" type="text/css" href="{{ asset('css/sos.css') }}">
            <link rel="stylesheet"  href="{{ asset('css/toastr.css') }}">

            <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
            <script src="{{ asset('js/bootstrap.min.js') }}"></script>
            <script src="{{ asset('js/toastr.min.js') }}"></script>

        </head>
        <body>
        <div id="soos" class="row" >





            <div class="col-md-3" style="direction: ltr" >
                <div class="card bg-dark text-white">
                    <h3 class="card-title text-center">
                        <div class="d-flex flex-wrap justify-content-center mt-2">
                            <a><span class="badge hours"></span></a> :
                            <a><span class="badge min"></span></a> :
                            <a><span class="badge sec"></span></a>
                        </div>
                    </h3>
                </div>
            </div>



        </div>




        <nav class="navbar navbar-expand navbar-dark bg-primary "> <a href="#menu-toggle" id="menu-toggle" class="navbar-brand"><span class="navbar-toggler-icon"></span></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarsExample02">
                <form class="form-inline my-2 my-md-0"> </form>
            </div>
        </nav>
        <div id="wrapper" class="toggled">
            <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li class="sidebar-brand"> <a href="{{ url('/') }}"> فروشگاه </a> </li>
                    <li> <a href="#">داشبورد</a> </li>
                    <li> <a id="bb">وارد کردن محصول</a> </li>
                    <li> <a id="gg">حذف محصول</a> </li>

                </ul>
            </div> <!-- /#sidebar-wrapper -->
            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="row" id="not"></div>
                <div id="box"   class="col-12">
                    <h1>پنل کاربری</h1>
                    <br>




                </div>
            </div> <!-- /#page-content-wrapper -->
        </div> <!-- /#wrapper -->
        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script> <!-- Menu Toggle Script -->
        <script>

            $(document).ready(function () {

                $("#bb").click(function(e) {


                    $('#box').load('/insert');
                });
                $("#gg").click(function(e) {

                    $('#box').load('/sss');
                });
            });

            $(function(){
                $("#menu-toggle").click(function(e) {
                    e.preventDefault();

                    $("#wrapper").toggleClass("toggled");
                });

                $(window).resize(function(e) {
                    if($(window).width()<=768){
                        $("#wrapper").removeClass("toggled");
                    }else{
                        $("#wrapper").addClass("toggled");
                    }
                });
            });
            $(document).ready(function() {
                setInterval( function() {
                    var hours = new Date().getHours();
                    $(".hours").html(( hours < 10 ? "0" : "" ) + hours);
                }, 1000);
                setInterval( function() {
                    var minutes = new Date().getMinutes();
                    $(".min").html(( minutes < 10 ? "0" : "" ) + minutes);
                },1000);
                setInterval( function() {
                    var seconds = new Date().getSeconds();
                    $(".sec").html(( seconds < 10 ? "0" : "" ) + seconds);
                },1000);
            });



        </script>








    </body>
    </html>
    </div>
</x-app-layout>
