<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    @include('layout.styles')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <x-header/>
    @yield('content')
    @include('layout.scripts')
    <x-footer/>
</body>
</html>
