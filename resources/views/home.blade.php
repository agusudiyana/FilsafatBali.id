<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FilsafatBali.id</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        html {
            scroll-behavior: smooth;
        }

        section {
            scroll-margin-top: 100px;
        }

        @keyframes fadeUp {

            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }

        }

        .fade-up {

            animation: fadeUp .8s ease;

        }

        .tab-active {
            color: #992B20;
            border-bottom: 2px solid #992B20;
            padding-bottom: 8px;
            font-weight: 600;
        }
    </style>
</head>

<body class="bg-white" style="font-family:'Inter',sans-serif;">

    @include('home.navbar')

    @include('home.hero')

    @include('home.kategori')

    @include('home.filsafat')

    @include('home.koleksi')

    @include('home.ajaran')

    @include('home.cecimpedan')

    @include('home.satua')

    @include('home.istilah')

    @include('home.artikel')

    @include('home.kontributor')

    @include('home.footer')

    @include('home.script')

</body>

</html>
