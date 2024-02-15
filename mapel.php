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

    // Check if form is submitted for updating
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id']) && isset($_POST['Mata_Pelajaran']) && isset($_POST['Nama_Guru'])) {
        $id = $_POST['id'];
        $mataPelajaran = $_POST['Mata_Pelajaran'];
        $namaGuru = $_POST['Nama_Guru'];

        // Update data in the database
        $updateQuery = "UPDATE mapel SET Mata_Pelajaran='$mataPelajaran', nama_guru='$namaGuru' WHERE id=$id";
        mysqli_query($koneksi_db, $updateQuery);
    }

    // Fetch data from the database
    $lock = "SELECT * FROM mapel";
    $query = mysqli_query($koneksi_db, $lock);
    ?>

    <header class="bg-dark text-white">
        <h1>Mata Pelajaran</h1>
    </header>

    <nav class="bg-light">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="Dashboard.php">Halaman Utama</a></li>
            <li class="nav-item"><a class="nav-link" href="mapel.php">Mapel</a></li>
            <li class="nav-item"><a class="nav-link" href="Event.php">Event</a></li>
            <li class="nav-item"><a class="nav-link" href="Data.php">Data Guru</a></li>
            <li class="nav-item"><a class="nav-link" href="data1.php">Data Siswa</a></li>
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

        <!-- Form to insert data into the database -->
        <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#tambahModal">Tambah</button>
        <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#updateModal">Update</button>
        <button type="button" class="btn btn-danger mb-2" data-toggle="modal" data-target="#deleteModal">Delete</button>
    </section>
    <!-- Modal for Tambah (Add) -->
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to insert data into the database -->
                    <form method="POST" action="sistemmapel.php" class="form-inline">
                        <label for="inputKdPelajaran" class="mr-sm-2">Tambah Kode Pelajaran:</label>
                        <input type="number" id="inputKdPelajaran" name="kd_pelajaran" class="form-control mb-2 mr-sm-2" required>
                        <label for="inputMapel" class="mr-sm-2">Tambah Mata Pelajaran:</label>
                        <input type="text" id="inputMapel" name="Mata_Pelajaran" class="form-control mb-2 mr-sm-2" required>
                        <label for="inputNamaGuru" class="mr-sm-2">Tambah Nama Guru:</label>
                        <input type="text" id="inputNamaGuru" name="Nama_Guru" class="form-control mb-2 mr-sm-2" required>
                        <button type="submit" class="btn btn-success mb-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Update -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Form to update data in the database -->
                    <form method="POST" action="updatemapel.php" class="form-inline">
                        <label for="updateKdPelajaran" class="mr-sm-2">Update Kode Pelajaran:</label>
                        <input type="number" id="updateKdPelajaran" name="kd_pelajaran" class="form-control mb-2 mr-sm-2" required>
                        <label for="updateMapel" class="mr-sm-2">Update Mata Pelajaran:</label>
                        <input type="text" id="updateMapel" name="Mata_Pelajaran" class="form-control mb-2 mr-sm-2" required>
                        <label for="updateNamaGuru" class="mr-sm-2">Update Nama Guru:</label>
                        <input type="text" id="updateNamaGuru" name="Nama_Guru" class="form-control mb-2 mr-sm-2" required>
                        <button type="submit" class="btn btn-warning mb-2">Update</button>
                        <button type="button" class="btn btn-secondary mb-2 ml-2" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this data?</p>
                    <!-- Form to delete data from the database -->
                    <form method="POST" action="deletemapel.php" class="form-inline">
                        <label for="deletekode" class="mr-sm-2">ID to Delete:</label>
                        <input type="number" id="deletekode" name="kd_pelajaran" class="form-control mb-2 mr-sm-2" required>
                        <button type="submit" class="btn btn-danger mb-2">Delete</button>
                        <button type="button" class="btn btn-secondary mb-2 ml-2" data-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-dark text-white">
        <p>&copy; 2024 Sistem Informasi</p>
    </footer>

    <!-- Script to fetch data from the database -->
    <script>
        function editData(id, mataPelajaran, namaGuru) {
            // Populate the form with existing data
            document.getElementById('updateId').value = id;
            document.getElementById('updateMapel').value = mataPelajaran;
            document.getElementById('updateNamaGuru').value = namaGuru;

            // Scroll to the update form
            document.getElementById('updateForm').scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Function to cancel the update and scroll back to the top
        function cancelUpdate() {
            document.getElementById('updateForm').reset();
            window.location.href = '#';
        }
    </script>
    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>