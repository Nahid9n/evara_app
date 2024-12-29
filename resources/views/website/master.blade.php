
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$setting->company_name}} | @yield('title')</title>

    @include('website.includes.meta')
    @include('website.includes.style')
    <style>
        .main {
            position: relative;
        }
        .main::before {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>

</head>

<body class="" style="overflow-x: hidden">


@include('website.includes.header')

<main class="" id="mainContainer">
   @yield('body')
</main>


@include('website.includes.footer')
@include('website.includes.script')
</body>

</html>
