<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById('dropdown-menu');
            dropdownMenu.classList.toggle('hidden');
        }
    </script>
    <style>
        .active {
            font-weight: bold;
            color: #2563eb; /* Tailwind Blue-600 */
        }
        .active-orange {
            font-weight: bold;
            color: #f97316; /* Tailwind Orange-500 */
        }
    </style>
</head>
<body class="h-screen font-sans bg-gray-100">

<header class="bg-white shadow-md">
    <div class="max-w-8xl mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <div class="flex items-center">
                <div class="text-xl font-bold text-blue-600">
                    <a href="{{ route('dashboard.index') }}">Manajemen Sekolah</a>
                </div>
                <nav class="hidden md:flex space-x-4 ml-10">
                    <a href="{{ route('dashboard.index') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">Beranda</a>
                    <a href="{{ route('siswa.index') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('siswa.index') ? 'active-orange' : '' }}">Data Siswa</a>
                    <a href="{{ route('guru.index') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('guru.index') ? 'active' : '' }}">Data Guru</a>
                    <a href="{{ route('kelas.index') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('kelas.index') ? 'active-orange' : '' }}">Data Kelas</a>
                    <a href="{{ route('jurusan.index') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('jurusan.index') ? 'active' : '' }}">Data Jurusan</a>
                    <a href="{{ route('organisasi.index') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('organisasi.index') ? 'active-orange' : '' }}">Data Organisasi</a>
                    <a href="{{ route('ekskul.index') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('ekskul.index') ? 'active' : '' }}">Data Ekstrakurikuler</a>
                    <a href="{{ route('mapel.index') }}" class="text-gray-700 hover:text-blue-600 {{ request()->routeIs('mapel.index') ? 'active-orange' : '' }}">Data Mapel</a>
                </nav>
            </div>
            <div class="relative">
                <button id="user-menu-button" class="flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 focus:outline-none" onclick="toggleDropdown()">
                    {{ Auth::user()->name }}
                    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div id="dropdown-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="block w-full px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                            Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>

</body>
</html>
