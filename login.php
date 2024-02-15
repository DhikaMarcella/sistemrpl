<?php
include('koneksi.php');

// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Menambahkan pengambilan data role dari form

    // Lindungi dari SQL Injection dengan Prepared Statements
    if ($role == "admin") {
        $query = "SELECT * FROM admin WHERE username=? AND password=?";
    } elseif ($role == "siswa") {
        $query = "SELECT * FROM user WHERE username=? AND password=?";
    } else {
        echo '<script>alert("Invalid role.");</script>';
        exit();
    }

    // Persiapkan statement
    $stmt = mysqli_prepare($koneksi_db, $query);

    if ($stmt) {
        // Binding parameter ke statement
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);

        // Eksekusi statement
        mysqli_stmt_execute($stmt);

        // Ambil hasil
        $result = mysqli_stmt_get_result($stmt);

        // Periksa hasil query
        if ($row = mysqli_fetch_assoc($result)) {
            // Set session
            $_SESSION['username'] = $row['username']; // Gantilah $row['username'] dengan kolom yang menyimpan username pengguna

            // Redirect ke halaman dashboard sesuai role
            if ($role == "admin") {
                header('Location: dashboard.php');
            } elseif ($role == "siswa") {
                header('Location: dashboard_siswa.php'); // Sesuaikan dengan struktur file Anda
            }
            exit();
        } else {
            // Autentikasi gagal
            echo '<script>alert("Login failed. Please check your username and password.");</script>';
        }
    } else {
        // Error dalam eksekusi query
        echo '<script>alert("Error: ' . mysqli_error($koneksi_db) . '");</script>';
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
} else {
    // Error dalam membuat statement
    echo '<script>alert("Invalid request method.");</script>';
}

// Tutup koneksi database
$koneksi_db->close();
