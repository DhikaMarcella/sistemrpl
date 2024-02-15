<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $deletekode = "'" . $_POST['kd_pelajaran'] . "'";

    // Construct and execute SQL DELETE query
    $delete_query = "DELETE FROM mapel
                     WHERE kd_pelajaran = $deletekode";

    if ($koneksi_db->query($delete_query) === TRUE) {
        header("Location: mapel.php");
        exit();
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $delete_query . '<br>' . $koneksi_db->error . '</div>';
    }

    $koneksi_db->close();
}