<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
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

    .register-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        background-color: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 0.375rem;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        padding: 1rem;
        max-width: 300px;
        /* Lebar maksimum dikurangi agar lebih kecil */
        width: 100%;
    }

    .form-label {
        display: block;
        margin-bottom: 0.25rem;
        font-size: 0.75rem;
        color: #4a5568;
    }

    .form-input,
    .form-select {
        width: 100%;
        padding: 0.25rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        margin-bottom: 0.25rem;
        transition: border-color 0.3s;
        font-size: 0.75rem;
    }

    .form-input:focus,
    .form-select:focus {
        outline: none;
        border-color: #4c51bf;
        box-shadow: 0 0 0 3px rgba(76, 81, 191, 0.1);
    }

    .form-button {
        background-color: #48bb78;
        color: #fff;
        padding: 0.25rem;
        border-radius: 0.375rem;
        width: 100%;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 0.75rem;
    }

    .form-button:hover {
        background-color: #38a169;
    }

    .form-footer {
        margin-top: 0.25rem;
        font-size: 0.75rem;
        color: #4a5568;
    }

    .form-footer a {
        color: #4299e1;
        text-decoration: none;
    }

    .form-footer a:hover {
        text-decoration: underline;
    }

    .password-strength {
        margin-top: 0.25rem;
        font-size: 0.75rem;
        color: #4a5568;
        display: flex;
        justify-content: space-between;
    }

    .password-strength span {
        flex-grow: 1;
        height: 0.25rem;
        margin-right: 0.125rem;
        border-radius: 0.0625rem;
    }

    .password-requirements {
        margin-top: 0.25rem;
        font-size: 0.75rem;
        color: #4a5568;
    }

    .password-requirements ul {
        list-style-type: disc;
        margin-left: 1rem;
    }
    </style>
</head>

<body class="font-sans bg-gradient-to-r from-blue-500 to-purple-500">

    <div class="register-container">
        <div class="card">
            <h1 class="text-2xl font-semibold mb-2">Register&#127872;&#128165;</h1>
            <p class="text-gray-600 mb-2">Selamat Datang pengguna baru&#128535;&#128075;.</p>

            <form id="registerForm" action="regis.php" method="POST" onsubmit="register(event)">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-input" required>

                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-input"
                    oninput="checkPasswordStrength()" required>
                <div class="password-requirements">
                    <p>Kata sandi harus memenuhi persyaratan berikut:</p>
                    <ul>
                        <li class="password-weak-text">Minimal 8 karakter</li>
                        <li class="password-medium-text">Mengandung setidaknya satu huruf kapital</li>
                        <li class="password-medium-text">Mengandung setidaknya satu huruf kecil</li>
                        <li class="password-medium-text">Mengandung setidaknya satu angka</li>
                        <!-- Tambahkan persyaratan lain sesuai kebutuhan -->
                    </ul>
                </div>

                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-input" required>

                <label for="birthDate" class="form-label">Date of Birth</label>
                <input type="date" id="birthDate" name="birthDate" class="form-input" required>

                <label for="role" class="form-label">Role</label>
                <select id="role" name="role" class="form-select" required>
                    <option value="admin">Admin</option>
                    <option value="siswa">Siswa</option>
                </select>

                <button type="submit" class="form-button">Register</button>
            </form>

            <p class="form-footer">Already have an account? <a href="index.php">Login</a></p>
        </div>
    </div>

    <script>
    function checkPasswordStrength() {
        var password = document.getElementById('password').value;
        var weak = document.getElementById('weak');
        var medium = document.getElementById('medium');
        var strong = document.getElementById('strong');

        // Reset styles
        weak.style.backgroundColor = '';
        medium.style.backgroundColor = '';
        strong.style.backgroundColor = '';

        // Check password strength and apply styles
        if (password.length >= 8) {
            weak.style.backgroundColor = '#ff4d4f';
        }
        if (password.match(/[a-z]/) && password.match(/[A-Z]/)) {
            medium.style.backgroundColor = '#faad14';
        }
        if (password.match(/[0-9]/)) {
            strong.style.backgroundColor = '#52c41a';
        }
    }
    </script>

</body>

</html>