<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

  <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-sm">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Login</h2>

    <form id="loginForm" class="space-y-4">
      <div>
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="text" name="email" id="email" placeholder="Email" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <div>
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" placeholder="Password" required
               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
      </div>

      <button type="submit"
              class="w-full bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 transition duration-200">
        Login
      </button>
    </form>

    <p id="responseMsg" class="mt-4 text-center text-sm text-gray-600"></p>
  </div>

  <script>
    // document.getElementById('loginForm').addEventListener('submit', async (e) => {
    //   e.preventDefault();
    //   const formData = new URLSearchParams(new FormData(e.target));

    //   try {
    //     const res = await fetch('http://127.0.0.1:3000/submit', {
    //       method: 'POST',
    //       headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    //       body: formData
    //     });

    //     const text = await res.text();
    //     document.getElementById('responseMsg').textContent = text;
    //     document.getElementById('responseMsg').classList.add('text-green-600');
    //   } catch (err) {
    //     document.getElementById('responseMsg').textContent = '❌ Error: ' + err.message;
    //     document.getElementById('responseMsg').classList.add('text-red-600');
    //   }
    // });

    document.getElementById('loginForm').addEventListener('submit', async (e) => {
  e.preventDefault();
  const formData = new URLSearchParams(new FormData(e.target));

  try {
    const res = await fetch('https://soft.empirekit.ng/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
      },
      body: formData,
      credentials: 'include' // ✅ This allows Laravel to set cookies
    });

    const html = await res.text();
    document.getElementById('responseMsg').innerHTML = html;
  } catch (err) {
    document.getElementById('responseMsg').textContent = '❌ Error: ' + err.message;
  }
});

  </script>

</body>
</html>
