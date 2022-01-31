<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rupokar</title>

    <meta charset="UTF-8">
    <meta name="description" content="ClickFix">
    <meta name="keywords" content="ClickFix">
    <meta name="author" content="Rupokar">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('frontend-assets/images/favicon.png') }}" type="image/gif" sizes="16x16">

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend-assets/fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets/css/style.scss') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend-assets/css/responsive.css') }}">   

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    @yield('style')

</head>

<body>

    <!-- header -->
    @include('layouts.frontend.header')
    <!-- main content -->
    @yield('content')
    <!-- footer -->
    @include('layouts.frontend.footer')

    <!-- script start -->

    <script type="text/javascript" src="{{ asset('frontend-assets/js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend-assets/js/jquery-3.3.1.slim.min.js') }}"></script>

    <!-- <script type="text/javascript" src="{{ asset('frontend-assets/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend-assets/js/bootstrap.min.js') }}"></script> -->
    <!-- <script type="text/javascript" src="{{ asset('frontend-assets/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend-assets/js/respond.min.js') }}"></script> -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="text/javascript" src="{{ asset('frontend-assets/js/custom.js') }}"></script>

    @yield('script')

    <!-- script end -->

</body>

</html>