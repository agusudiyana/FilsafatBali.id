<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <!-- Viewport Responsif Ponsel (HP) & Laptop -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>FilsafatBali.id</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/feather-icons"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

    <style>
        html {
            scroll-behavior: smooth;
        }

        /* Scroll margin adaptif HP & Laptop */
        section {
            scroll-margin-top: 70px;
        }

        @media (min-width: 640px) {
            section {
                scroll-margin-top: 100px;
            }
        }

        /* Mencegah layar HP bisa digeser ke samping (No Horizontal Scroll) */
        html, body {
            max-width: 100%;
            overflow-x: hidden;
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

<body class="bg-white overflow-x-hidden" style="font-family:'Inter',sans-serif;">

    <!-- Pembungkus Utama agar Aman di HP -->
    <div class="w-full overflow-x-hidden">
        @include('home.navbar')

        @include('home.hero')

        @include('home.kategori')

        @include('home.filsafat')

        @include('home.koleksi')

        @include('home.ajaran')

        @include('home.artikel')

        @include('home.cecimpedan')

        @include('home.satua')

        @include('home.istilah')

        @include('home.kontributor')

        @include('home.footer')
    </div>

    @include('home.script')

</body>

</html>