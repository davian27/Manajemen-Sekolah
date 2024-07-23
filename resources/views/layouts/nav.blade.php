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
</head>
<body class="h-screen font-sans">

<header class="relative px-8 bg-gray-100 shadow-md">
    <div class="w-full h-15 max-w-6xl mx-auto flex items-center justify-between">
        <div class="flex-grow font-bold text-xl">
            <a href="{{route('dashboard.index')}}">Manajemen Sekolah</a>
        </div>
        <ul class="flex gap-8 list-none">
            <li><a href="{{route('dashboard.index')}}" class="text-blue-600">Beranda</a></li>
            <li><a href="{{route('siswa.index')}}" class="text-blue-600">Data Siswa</a></li>
            <li><a href="{{route('kelas.index')}}" class="text-blue-600">Data Kelas</a></li>
            <li><a href="{{route('jurusan.index')}}" class="text-blue-600">Data Jurusan</a></li>
            <li><a href="{{route('organisasi.index')}}" class="text-blue-600">Data Organisasi</a></li>
            <li><a href="{{route('ekskul.index')}}" class="text-blue-600">Data Ekstrakurikuler</a></li>
            <li><a href="{{route('mapel.index')}}" class="text-blue-600">Data Mapel</a></li>
        </ul>
        <div class="flex items-center gap-4">
            <div class="sm:flex sm:gap-4">
                <div class="relative">
                    <button
                        id="user-menu-button"
                        class="rounded-md px-3 py-2 text-sm font-medium text-black flex items-center"
                        onclick="toggleDropdown()"
                    >
                        {{ Auth::user()->name }}
                        <svg
                            class="ml-2 h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>
                    </button>
                    <div
                        id="dropdown-menu"
                        class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1"
                        role="menu"
                        aria-orientation="vertical"
                        aria-labelledby="user-menu-button"
                    >
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                type="submit"
                                class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem"
                            >
                                LogOut
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

</body>
</html>
