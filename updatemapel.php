<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $kdPelajaran = $_POST["kd_pelajaran"];
    $mataPelajaran = $_POST["Mata_Pelajaran"];
    $namaGuru = $_POST["Nama_Guru"];

    // Construct and execute SQL UPDATE query
    $update_query = "UPDATE mapel SET 
                    Mata_Pelajaran='$mataPelajaran', 
                     nama_guru='$namaGuru' 
                     WHERE kd_pelajaran=$kdPelajaran";

    if ($koneksi_db->query($update_query) === TRUE) {
        header("Location: mapel.php");
        exit();
    } else {
        echo '<div class="alert alert-danger mt-3" role="alert">Error: ' . $query . '<br>' . $koneksi_db->error . '</div>';
    }
    $koneksi_db->close();
}
