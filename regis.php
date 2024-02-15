<?php
include('koneksi.php');

// Mulai sesi jika belum dimulai
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $birthDate = $_POST['birthDate'];
    $role = $_POST['role'];

    // Lindungi dari SQL Injection dengan Prepared Statements
    if ($role == "admin") {
        $query = "INSERT INTO admin (username, password, email, birthDate) VALUES (?, ?, ?, ?)";
    }

    if ($role == "siswa") {
        $query = "INSERT INTO user (username, password, email, birthDate) VALUES (?, ?, ?, ?)";
    }

    // Persiapkan statement
    $stmt = mysqli_prepare($koneksi_db, $query);

    if ($stmt) {
        // Binding parameter ke statement
        mysqli_stmt_bind_param($stmt, "ssss", $username, $password, $email, $birthDate);

        // Eksekusi statement
        $success = mysqli_stmt_execute($stmt);

        // Periksa hasil query
        if ($success) {
            // Set session
            $_SESSION['username'] = $username;

            // Redirect ke halaman dashboard sesuai role
            if ($role == "admin") {
                header('Location: dashboard.php');
                exit();
            } elseif ($role == "siswa") {
                header('Location: dashboard_siswa.php');
                exit();
            }
        } else {
            // Pendaftaran gagal, cetak pesan kesalahan MySQL
            echo '<script>alert("Registration failed. Please try again. ' . mysqli_error($koneksi_db) . '");</script>';
        }

        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        // Error dalam membuat statement
        echo '<script>alert("Error in preparing statement.");</script>';
    }
} else {
    // Metode request tidak valid
    echo '<script>alert("Invalid request method.");</script>';
}

// Tutup koneksi database
$koneksi_db->close();
