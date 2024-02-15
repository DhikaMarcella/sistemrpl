<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mata Pelajaran</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        section {
            margin-left: 220px;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            border-radius: 5px;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
            clear: both;
        }
    </style>
</head>

<body>

    <?php
    include('koneksi.php');

    // Fetch data from the database
    $lock = "SELECT * FROM mapel";
    $query = mysqli_query($koneksi_db, $lock);
    ?>

    <header class="bg-dark text-white">
        <h1>Mata Pelajaran</h1>
    </header>

    <nav class="bg-light">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="Dashboard_siswa.php">Halaman Utama</a></li>
            <li class="nav-item"><a class="nav-link" href="mapel_siswa.php">Mapel</a></li>
            <li class="nav-item"><a class="nav-link" href="Event_siswa.php">Event</a></li>
            <li class="nav-item"><a class="nav-link" href="Dataguru_siswa.php">Data Guru</a></li>
            <li class="nav-item"><a class="nav-link" href="data_siswa.php">Data Siswa</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Jadwal Pelajaran</a></li>
        </ul>
    </nav>

    <section>
        <h2>Daftar Mata Pelajaran</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode Pelajaran</th>
                    <th>Mata Pelajaran</th>
                    <th>Nama Guru</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $row) : ?>
                    <tr>
                        <td><?php echo $row['kd_pelajaran'] ?></td>
                        <td><?php echo $row['Mata_Pelajaran'] ?></td>
                        <td><?php echo $row['nama_guru'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <footer class="bg-dark text-white">
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>