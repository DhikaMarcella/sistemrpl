<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Event</title>

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

        $alertMessage = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama_event = $_POST['nama_event'];

            // Delete data from the 'event' table based on nama_event
            $delete = mysqli_query($koneksi_db, "DELETE FROM event WHERE nama_event = '$nama_event'");

            if ($delete) {
                $alertMessage = '<div class="mb-4 text-green-700 bg-green-100 border border-green-400 px-4 py-2 rounded-md">Event successfully deleted. <span class="float-right cursor-pointer" onclick="closeAlert()">✖</span></div>';
            } else {
                $alertMessage = '<div class="mb-4 text-red-700 bg-red-100 border border-red-400 px-4 py-2 rounded-md">Error deleting event: ' . mysqli_error($koneksi_db) . ' <span class="float-right cursor-pointer" onclick="closeAlert()">✖</span></div>';
            }
        }
        ?>

        <h1 class="text-2xl font-bold mb-4">Delete Event</h1>

        <?php echo $alertMessage; ?>

        <form action="" method="post">
            <div class="mb-4">
                <label for="nama_event" class="block text-sm font-medium text-gray-600">Nama Event</label>
                <input type="text" name="nama_event" id="nama_event" placeholder="Enter event name"
                    class="mt-1 p-2 w-full border rounded-md">
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="px-4 py-2 bg-red-500 text-white rounded-md cursor-pointer hover:bg-red-700">Delete
                    Event</button>
            </div>
        </form>
    </div>

    <!-- JavaScript to close the alert -->
    <script>
    function closeAlert() {
        document.querySelector('.mb-4').style.display = 'none';
    }
    </script>
</body>

</html>