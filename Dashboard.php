<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Informasi</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
    }

    nav {
        width: 200px;
        background-color: #f4f4f4;
        padding: 10px;
        float: left;
        height: 100vh;
    }

    nav ul {
        list-style-type: none;
        padding: 0;
    }

    nav li {
        margin-bottom: 10px;
    }

    nav a {
        display: block;
        padding: 8px;
        text-decoration: none;
        background-color: #ddd;
        color: #333;
        border-radius: 5px;
    }

    .logout-btn {
        background-color: #d9534f !important;
        /* Warna merah untuk tombol Log Out */
        color: #fff !important;
    }

    section {
        margin-left: 220px;
        padding: 20px;
    }

    footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        clear: both;
    }

    /* Tambahkan gaya khusus untuk gambar di halaman utama */
    .home-image {
        max-width: 100%;
        height: auto;
    }
    </style>
</head>

<body>

    <header class="bg-dark text-white">
        <h1>Sistem Informasi RPL</h1>
    </header>

    <nav class="bg-light">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="Dashboard.php">Halaman Utama</a></li>
            <li class="nav-item"><a class="nav-link" href="mapel.php">Mapel</a></li>
            <li class="nav-item"><a class="nav-link" href="Event.php">Event</a></li>
            <li class="nav-item"><a class="nav-link" href="Data.php">Data Guru</a></li>
            <li class="nav-item"><a class="nav-link" href="data1.php">Data Siswa</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Jadwal Pelajaran</a></li>
            <li class="nav-item"><a class="nav-link logout-btn" href="index.php">Log Out</a></li>
        </ul>
    </nav>

    <section>
        <h2>Selamat datang di Website RPL di SMKN 5 KOTA BEKASI</h2>
        <!-- Konten utama dashboard akan ditampilkan di sini -->
        <img src="3.jpg" alt="Gambar Halaman Utama" class="home-image img-fluid">
        <h2>Kejuruan Rekayasa Perangkat Lunak</h2>
        <p>Menyongsong masa depan digital dengan keahlian di bidang Rekayasa Perangkat Lunak. Kami mendorong siswa
            untuk
            menjadi pengembang perangkat lunak handal dengan keterampilan dan pengetahuan terkini.</p>
        <p>Di sini, kami membimbing setiap siswa untuk menguasai pemrograman, pengujian perangkat lunak, dan
            metodologi
            pengembangan terbaik. Bergabunglah dengan kami dan jadilah bagian dari revolusi teknologi!</p>
    </section>

    <footer class="bg-dark text-white">
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>

    <!-- Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>