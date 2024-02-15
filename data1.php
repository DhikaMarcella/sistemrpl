<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru & Siswa</title>
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
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        clear: both;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>

    <header>
        <h1>Data Siswa</h1>
    </header>

    <nav>
        <ul>
            <li><a href="Dashboard.php">Halaman Utama</a></li>
            <li><a href="mapel.php">Mapel</a></li>
            <li><a href="Event.php">Event</a></li>
            <li><a href="Data.php">Data Guru</a></li>
            <li><a href="data1.php">Data Siswa</a></li>
            <li><a href="#">Jadwal Pelajaran</a></li>
        </ul>
    </nav>

    <section>
        <h2>Data Siswa</h2>
        <table>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Ayah</th>
                    <th>Ibu</th>
                    <th>Pekerjaan Ayah</th>
                    <th>Pekerjaan Ibu</th>
                    <th>Alamat</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>10A</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Jane Doe</td>
                    <td>11B</td>
                </tr>
                <!-- Add more student data as needed -->
            </tbody>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>

</body>

</html>