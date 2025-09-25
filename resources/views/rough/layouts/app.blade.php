<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles
</head>
<body class="bg-gray-100">

  <!-- Sidebar -->
  <div id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg transform -translate-x-full transition-transform lg:translate-x-0 z-50">
    <div class="p-6">
      <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
      <nav class="space-y-4">
        <a href="{{route('dashboard')}}" class="flex items-center text-gray-700 hover:text-blue-600">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" /></svg>
          Dashboard
        </a>
        <a href="{{route('admin.info')}}" class="flex items-center text-gray-700 hover:text-blue-600">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M5.121 17.804A13.937 13.937 0 0112 15c3.314 0 6.314 1.343 8.879 3.516M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
          Users Info
        </a>
        <a href="{{route('admin.activity')}}" class="flex items-center text-gray-700 hover:text-blue-600">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6 0a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          Activity
        </a>
      </nav>
    </div>
  </div>

  <!-- Top Nav -->
  <header class="flex items-center justify-between bg-white shadow px-4 py-3 lg:ml-64">
  <button id="toggleSidebar" class="lg:hidden text-gray-600 focus:outline-none">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path d="M4 6h16M4 12h16M4 18h16" />
    </svg>
  </button>

  <h1 class="text-xl font-semibold">User Management</h1>

  <div class="relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 focus:outline-none">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path d="M5.121 17.804A4 4 0 0112 14h0a4 4 0 016.879 3.804M12 14v7m0 0H9m3 0h3" />
      </svg>
      <span class="hidden md:inline">Account</span>
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-50">
      <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
      </form>
    </div>
  </div>
</header>

  <!-- Main Content -->
  @yield('content')

  @livewireScripts
  <!-- JS for Sidebar Toggle -->
  <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.getElementById('sidebar');
    toggleBtn.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
    });
  </script>
</body>
</html>
