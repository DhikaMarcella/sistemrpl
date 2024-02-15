<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
    @keyframes gradientAnimation {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    body {
        animation: gradientAnimation 10s infinite linear;
    }

    .login-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }
    </style>
</head>

<body class="font-sans bg-gradient-to-r from-blue-500 to-purple-500">

    <div class="login-container">
        <div class="bg-white p-8 rounded-lg shadow-md w-96">
            <h2 class="text-2xl font-semibold mb-4">Login</h2>

            <form id="loginForm" action="login.php" method="POST" onsubmit="login(event)">
                <div class="mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-600">Username</label>
                    <input type="text" id="username" name="username"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 transition duration-300">
                </div>

                <div class="mb-4 relative">
                    <label for="password" class="block text-sm font-medium text-gray-600">Password</label>
                    <div class="flex items-center">
                        <input type="password" id="password" name="password"
                            class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 transition duration-300">
                    </div>
                </div>

                <div class="mb-4">
                    <label for="role" class="block text-sm font-medium text-gray-600">Login As</label>
                    <select id="role" name="role"
                        class="mt-1 p-2 w-full border rounded-md shadow-sm focus:outline-none focus:ring focus:border-blue-300 transition duration-300">
                        <option value="admin">Admin</option>
                        <option value="siswa">Siswa</option>
                    </select>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white p-2 rounded-md w-full hover:bg-blue-600 transition duration-300">Login</button>
            </form>

            <p class="mt-4 text-sm text-gray-600">Belum punya akun? <a href="register.php"
                    class="text-blue-500 hover:underline">Register</a></p>
        </div>
    </div>

</body>

</html>