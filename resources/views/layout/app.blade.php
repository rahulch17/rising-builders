<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rising Builders & Engineers Pvt. Ltd.</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700;1,900&family=DM+Sans:wght@300;400;500;600&family=Barlow+Condensed:wght@500;600;700&display=swap"
          rel="stylesheet">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
@include('layout.partials.header')
@include('layout.partials.mobile-menu')
@yield('content')
@include('layout.partials.footer')
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>