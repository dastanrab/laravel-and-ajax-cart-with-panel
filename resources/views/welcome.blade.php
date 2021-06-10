<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"  href="{{ asset('css/toastr.css') }}">

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
</head>
<body class="antialiased">

<div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0" >
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">داشبورد</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline" style="margin-left: 12px" >ورود</a>

                @if (Route::has('register'))

                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline" >ثبت نام</a>
                @endif
            @endauth
        </div>
    @endif





</div>
<div class="container">

    <div class="row" id="header-bar">
        @include('_header_cart')
    </div>

</div>
<div class="container page">

    @yield('content')
</div>
@yield('scripts')
</body>
</html>
