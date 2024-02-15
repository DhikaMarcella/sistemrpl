<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Event</title>

    <!-- Include Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100">
    <header class="bg-blue-500 p-4">
        <ul class="flex space-x-4">
            <li>
                <a href="event.php" class="text-white hover:text-gray-200">Back</a>
            </li>
        </ul>
    </header>

    <div class="container mx-auto mt-8 p-8 bg-white shadow-md rounded-md">

        <?php
        include 'koneksi.php';

        if (isset($_POST['save'])) {
            $nama_event = $_POST['namaevent'];
            $deskripsi = $_POST['deskripsi'];
            $tanggal = $_POST['tanggal'];

            // File upload handling
            $folder = './gallery/';
            $name_p = $_FILES['foto_event']['name'];
            $sumber_p = $_FILES['foto_event']['tmp_name'];
            move_uploaded_file($sumber_p, $folder . $name_p);

            // Insert data into the 'event' table
            $insert = mysqli_query($koneksi_db, "INSERT INTO event (nama_event, foto_event, deskripsi, tanggal) VALUES ('$nama_event', '$name_p', '$deskripsi', '$tanggal')");

            if ($insert) {
                echo '<script>showAlert("alert-success");</script>';
            } else {
                echo '<script>showAlert("alert-error", "' . mysqli_error($koneksi_db) . '");</script>';
            }
        }
        ?>

        <!-- Success Alert -->
        <div id="alert-success"
            class="hidden mb-4 text-green-700 bg-green-100 border border-green-400 px-4 py-2 rounded-md">
            Data berhasil disimpan. <span class="float-right cursor-pointer"
                onclick="closeAlert('alert-success')">✖</span>
        </div>

        <!-- Error Alert -->
        <div id="alert-error" class="hidden mb-4 text-red-700 bg-red-100 border border-red-400 px-4 py-2 rounded-md">
            Gagal disimpan: <span id="error-message"></span> <span class="float-right cursor-pointer"
                onclick="closeAlert('alert-error')">✖</span>
        </div>

        <form action="" method="post" enctype="multipart/form-data" class="max-w-md mx-auto"
            onsubmit="showSuccessAlert()">
            <div class="mb-4">
                <label for="namaevent" class="block text-sm font-medium text-gray-600">Nama Event</label>
                <input type="text" name="namaevent" id="namaevent" placeholder="Masukkan nama event"
                    class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="foto_event" class="block text-sm font-medium text-gray-600">Foto Event</label>
                <input type="file" name="foto_event" id="foto_event" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <label for="deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi"
                    class="mt-1 p-2 w-full border rounded-md"></textarea>
            </div>

            <div class="mb-4">
                <label for="tanggal" class="block text-sm font-medium text-gray-600">Tanggal</label>
                <input type="date" name="tanggal" id="tanggal" class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <input type="submit" name="save" value="Simpan"
                    class="px-4 py-2 bg-blue-500 text-white rounded-md cursor-pointer hover:bg-blue-700">
            </div>

        </form>
    </div>

    <!-- JavaScript for alert handling -->
    <script>
    function showSuccessAlert() {
        showAlert("alert-success");
        // Set timeout to close the alert after 5 seconds
        setTimeout(function() {
            closeAlert("alert-success");
        }, 15000);
    }

    function showAlert(alertId, message) {
        const alert = document.getElementById(alertId);
        alert.classList.remove('hidden');
        if (message) {
            document.getElementById('error-message').innerText = message;
        }

        // Set timeout to close the alert after 5 seconds only for error alerts
        if (alertId === "alert-error") {
            setTimeout(function() {
                closeAlert(alertId);
            }, 15000);
        }
    }

    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        alert.classList.add('hidden');
    }
    </script>
</body>

</html>