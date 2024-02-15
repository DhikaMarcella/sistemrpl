<?php
include('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kd_pelajaran']) && isset($_POST['Mata_Pelajaran']) && isset($_POST['Nama_Guru'])) {
    $kdPelajaran = $_POST['kd_pelajaran'];
    $mataPelajaran = $_POST['Mata_Pelajaran'];
    $namaGuru = $_POST['Nama_Guru'];

    // Insert data into the database
    $insertQuery = "INSERT INTO mapel (kd_pelajaran, Mata_Pelajaran, nama_guru) VALUES ('$kdPelajaran', '$mataPelajaran', '$namaGuru')";
    mysqli_query($koneksi_db, $insertQuery);

    // Redirect back to mapel.php after insertion
    header("Location: mapel.php");
    exit();
}
?>