<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Your Website Title')</title> <!-- Dynamic Title -->

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Add custom page-specific styles -->
    @yield('custom-styles')
</head>
<body>
    
    <!-- Header Include -->
    @include('frontend.layouts.header')

    <!-- Search Form -->
    <div class="search-bar">
        <form action="{{ route('search') }}" method="GET">
            <input type="text" name="search" placeholder="What do you need?">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Main Content -->
    @yield('main-container')

    <!-- Footer Include -->
    @include('frontend.layouts.footer')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Add custom page-specific scripts -->
    @yield('custom-scripts')
</body>
</html>
