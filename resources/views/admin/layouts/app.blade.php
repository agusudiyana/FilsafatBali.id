<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin FilsafatBali</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-[#F7F0E7]">

<div class="flex">

    @include('admin.partials.sidebar')

    <div class="flex-1">

        @include('admin.partials.navbar')

        <main class="p-8">

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>