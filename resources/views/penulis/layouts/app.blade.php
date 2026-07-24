<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Penulis - FilsafatBali</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-[#F7F0E7]">

<div class="flex min-h-screen">

    @include('penulis.partials.sidebar')

    <div class="flex-1">

        @include('penulis.partials.navbar')

        <main class="p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>