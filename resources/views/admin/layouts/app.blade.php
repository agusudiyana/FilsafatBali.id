<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin FilsafatBali</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

    <!-- CSS Paksa Menghilangkan Scrollbar Abu-abu -->
    <style>
        /* Sembunyikan scrollbar untuk Chrome, Safari, dan Opera */
        ::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }

        /* Sembunyikan scrollbar untuk IE, Edge, dan Firefox */
        html, body, div, main {
            -ms-overflow-style: none !important;  /* IE dan Edge */
            scrollbar-width: none !important;  /* Firefox */
        }
    </style>
</head>

<body class="bg-[#F7F0E7] overflow-x-hidden">

<div class="flex min-h-screen overflow-hidden">

    @include('admin.partials.sidebar')

    <div class="flex-1 min-w-0 overflow-x-hidden">

        @include('admin.partials.navbar')

        <main class="p-8">
            @yield('content')
        </main>

    </div>

</div>

</body>

</html>