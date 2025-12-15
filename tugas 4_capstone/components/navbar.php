<nav class="fixed w-full z-50 top-0 start-0 bg-slate-900/90 backdrop-blur-md border-b border-white/10 transition-all duration-300">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    
    <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
        <div class="w-10 h-10 bg-teal-600 rounded-full flex items-center justify-center text-white text-xl font-bold">
            <i class="ph-fill ph-paper-plane-tilt"></i>
        </div>
        <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Pixie</span>
    </a>

    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-400 rounded-lg md:hidden hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false" onclick="toggleMenu()">
        <span class="sr-only">Open main menu</span>
        <i class="ph-bold ph-list text-2xl"></i>
    </button>

    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-700 rounded-lg bg-gray-800 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-transparent">
        
        <li>
          <a href="index.php" class="block py-2 px-3 text-white bg-teal-700 rounded md:bg-transparent md:text-teal-500 md:p-0 transition-colors" aria-current="page">
            Beranda
          </a>
        </li>

        <li>
          <a href="index.php#about" class="block py-2 px-3 text-gray-300 rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-teal-500 md:p-0 transition-colors">
            About
          </a>
        </li>

        <li>
          <a href="index.php#packages" class="block py-2 px-3 text-gray-300 rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-teal-500 md:p-0 transition-colors">
            Paket Liburan
          </a>
        </li>
        <li>
          <a href="index.php?page=pemesanan" class="block py-2 px-3 text-gray-300 rounded hover:bg-gray-700 md:hover:bg-transparent md:border-0 md:hover:text-teal-500 md:p-0 transition-colors">
            Data Pemesanan
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<script>
    function toggleMenu() {
        const nav = document.getElementById('navbar-default');
        nav.classList.toggle('hidden');
    }
</script>