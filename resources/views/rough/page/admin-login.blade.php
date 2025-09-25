<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/@heroicons/react/24/solid/index.js" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-indigo-600 to-purple-600 min-h-screen flex items-center justify-center">

  <div class="bg-white/10 backdrop-blur-lg rounded-xl shadow-xl p-8 w-full max-w-md text-white">
    <h2 class="text-3xl font-bold mb-6 text-center">Welcome Back 👋</h2>

    <form class="space-y-6" action="{{route('login')}}" method="post">
        @csrf
      <!-- Email -->
      <div class="relative">
        <label class="block mb-1 text-sm font-medium">Email</label>
        <div class="flex items-center bg-white/20 rounded-lg px-4 py-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12H8m0 0H6m2 0h8m0 0h2m-2 0v4m0-4V8m0 4H8" />
          </svg>
          <input name="email" type="email" placeholder="you@example.com" class="bg-transparent w-full outline-none text-white placeholder-white" required />
        </div>
      </div>

      <!-- Password -->
      <div class="relative">
        <label class="block mb-1 text-sm font-medium">Password</label>
        <div class="flex items-center bg-white/20 rounded-lg px-4 py-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 0v4m0 0h4m-4 0H8" />
          </svg>
          <input name="password" type="password" id="password" placeholder="••••••••" class="bg-transparent w-full outline-none text-white placeholder-white" required />
          <button type="button" onclick="togglePassword()" class="ml-2 text-white hover:text-gray-300">
            👁️
          </button>
        </div>
      </div>

      <!-- Submit -->
      <button type="submit" class="w-full bg-white text-indigo-600 font-semibold py-2 rounded-lg hover:bg-gray-100 transition">
        Login
      </button>
    </form>

    <p class="mt-6 text-center text-sm text-white/80">
      Don't have an account?
      <a href="#" class="text-white font-semibold hover:underline">Sign up</a>
    </p>
  </div>

  <script>
    function togglePassword() {
      const pwd = document.getElementById("password");
      pwd.type = pwd.type === "password" ? "text" : "password";
    }
  </script>
</body>
</html>
