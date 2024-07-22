<header class="bg-slate-700">
    <div class="mx-auto max-w-screen-xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="md:flex md:items-center md:gap-12"></div>

        <div class="hidden md:block">
          <nav aria-label="Global">
            <ul class="flex items-center gap-6 text-sm fw-bold">
              <li>
                <a
                  class="text-gray-100 transition hover:text-gray-300/75 dark:text-white dark:hover:text-white/75"
                  href=""
                >
                  Beranda
                </a>
              </li>

              <li>
                <a
                  class="text-gray-100 transition hover:text-gray-300/75 dark:text-white dark:hover:text-white/75"
                  href=""
                >
                  Data siswa
                </a>
              </li>

              <li>
                <a
                  class="text-gray-100 transition hover:text-gray-300/75 dark:text-white dark:hover:text-white/75"
                  href=""
                >
                  Data Kelas
                </a>
              </li>

              <li>
                <a
                  class="text-gray-100 transition hover:text-gray-300/75 dark:text-white dark:hover:text-white/75"
                  href=""
                >
                  Data Jurusan
                </a>
              </li>

              <li>
                <a
                  class="text-gray-100 transition hover:text-gray-300/75 dark:text-white dark:hover:text-white/75"
                  href=""
                >
                  Data Organisasi
                </a>
              </li>

              <li>
                <a
                  class="text-gray-100 transition hover:text-gray-300/75 dark:text-white dark:hover:text-white/75"
                  href=""
                >
                  Data Ekskul
                </a>
              </li>
            </ul>
          </nav>
        </div>

        <div class="flex items-center gap-4">
          <div class="sm:flex sm:gap-4">
            <div class="hidden sm:flex">
              <div class="relative">

                <button
                  id="user-menu-button"
                  class="rounded-md px-3 py-2 text-sm font-medium text-white flex items-center"
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
                      class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200"
                      role="menuitem"
                    >
                      LogOut
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="block md:hidden">
            <button
              class="rounded bg-gray-100 p-2 text-gray-600 transition hover:text-gray-600/75 dark:bg-gray-800 dark:text-white dark:hover:text-white/75"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-5 w-5"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M4 6h16M4 12h16M4 18h16"
                />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>

  <script>
    function toggleDropdown() {
      var dropdownMenu = document.getElementById('dropdown-menu');
      dropdownMenu.classList.toggle('hidden');
    }

    document.addEventListener('click', function (event) {
      var dropdownMenu = document.getElementById('dropdown-menu');
      var userMenuButton = document.getElementById('user-menu-button');
      if (!userMenuButton.contains(event.target)) {
        dropdownMenu.classList.add('hidden');
      }
    });
  </script>
