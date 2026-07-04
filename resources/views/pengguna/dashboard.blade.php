<x-app-layout>
    <div class="p-6">
        <h1>Dashboard Pengguna</h1>
        <h3>Selamat Datang {{ auth()->user()->name }}</h3>
    </div>
</x-app-layout>