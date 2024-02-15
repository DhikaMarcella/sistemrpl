<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags for character set and viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Page title -->
    <title>Event Sekolah</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Your custom CSS styles -->
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

    footer {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
        position: fixed;
        bottom: 0;
        width: 100%;
    }

    .event-container {
        margin-top: 20px;
    }

    .box-produk {
        width: 20%;
        min-height: 300px;
        border: 1px solid #ddd;
        margin: 2.2%;
        float: left;
        text-align: center;
        cursor: pointer;
        /* Menambahkan cursor pointer saat hover */
    }

    .box-produk img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 1px solid #ddd;
    }

    .box-produk h4 {
        margin-top: 10px;
    }

    .box-produk p {
        padding: 10px;
    }

    .btn-tambah {
        margin-top: 20px;
    }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="bg-dark text-white">
        <h1>Event Sekolah</h1>
    </header>

    <!-- Navigation -->
    <nav class="bg-light">
        <ul class="nav flex-column">
            <!-- Navigation items with links -->
            <li class="nav-item"><a class="nav-link" href="Dashboard.php">Halaman Utama</a></li>
            <li class="nav-item"><a class="nav-link" href="mapel.php">Mapel</a></li>
            <li class="nav-item"><a class="nav-link" href="Event.php">Event</a></li>
            <li class="nav-item"><a class="nav-link" href="Data.php">Data Guru</a></li>
            <li class="nav-item"><a class="nav-link" href="data1.php">Data Siswa</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Jadwal Pelajaran</a></li>
        </ul>
    </nav>

    <!-- Main Content Section -->
    <section class="container">
        <!-- Event Container for displaying events -->
        <div class="event-container" id="eventContainer">
            <?php
            // Include database connection
            include 'koneksi.php';

            // Retrieve events from the database
            $gallery = mysqli_query($koneksi_db, "SELECT * FROM event");

            // Loop through each event and display in a box
            while ($hasil = mysqli_fetch_array($gallery)) {
            ?>
            <!-- Box for each event with data-toggle and data-target for the modal -->
            <div class="box-produk" data-toggle="modal" data-target="#eventModal"
                data-image="gallery/<?php echo $hasil['foto_event'] ?>" data-title="<?php echo $hasil['nama_event'] ?>"
                data-description="<?php echo isset($hasil['deskripsi']) ? $hasil['deskripsi'] : 'No description available'; ?>"
                data-full-description="<?php echo $hasil['deskripsi']; ?>" data-date="<?php echo $hasil['tanggal']; ?>">
                <!-- Event image -->
                <img src="gallery/<?php echo $hasil['foto_event'] ?>" alt="<?php echo $hasil['nama_event'] ?>">
                <!-- Event title -->
                <h4><?php echo $hasil['nama_event']; ?></h4>
                <!-- Event short description -->
                <p class="short-description">
                    <?php echo strlen($hasil['deskripsi']) > 100 ? substr($hasil['deskripsi'], 0, 100) . '...' : $hasil['deskripsi']; ?>
                </p>
                <!-- Event date -->
                <p><?php echo $hasil['tanggal']; ?></p>
            </div>
            <?php } ?>
        </div>
    </section>

    <!-- Button to Add Event (moved outside the section) -->
    <button class="btn btn-primary btn-tambah" onclick="window.location.href='upload.php'">Tambah Event</button>
    <button class="btn btn-danger btn-hapus" onclick="window.location.href='hapusupload.php'">Hapus Event</button>

    <!-- Modal for displaying event details -->
    <div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Event Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="eventModalImage" src="" alt="Event Image" style="width: 100%;">
                    <h4 id="eventModalTitle"></h4>
                    <p id="eventModalDescription" class="full-description"></p>
                    <p id="eventModalDate"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white">
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Script to handle modal content dynamically -->
    <script>
    $(document).ready(function() {
        $('.box-produk').click(function() {
            var image = $(this).data('image');
            var title = $(this).data('title');
            var shortDescription = $(this).find('.short-description').text();
            var fullDescription = $(this).data('full-description');
            var date = $(this).data('date');

            $('#eventModalImage').attr('src', image);
            $('#eventModalTitle').text(title);
            $('#eventModalDescription').text(shortDescription);
            $('.full-description').text(fullDescription);
            $('#eventModalDate').text(date);
        });
    });
    </script>

</body>

</html>