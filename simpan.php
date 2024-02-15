<?php
$koneksi = mysqli_connect("localhost", "root", "", "bmi");
// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Ambil nilai berat, tinggi, dan satuan dari formulir
$berat = $_POST['berat'];
$tinggi = $_POST['tinggi'];
$satuanBerat = $_POST['satuanBerat'];
$satuanTinggi = $_POST['satuanTinggi'];

// Konversi ke kilogram dan meter jika perlu
if ($satuanBerat === "lb") {
    $berat = $berat * 0.453592;
}

if ($satuanTinggi === "inch") {
    $tinggi = $tinggi * 0.0254;
} elseif ($satuanTinggi === "feet") {
    $tinggi = $tinggi * 0.3048;
} elseif ($satuanTinggi === "cm") {
    $tinggi = $tinggi * 0.01;
}

// Hitung BMI
$bmi = $berat / ($tinggi * $tinggi);

// Tambahkan data ke dalam database
$tanggal = date("Y-m-d");
$sql = "INSERT INTO data_bmi (berat, tinggi, bmi, keterangan, tanggal) VALUES ('$berat $satuanBerat', '$tinggi $satuanTinggi', '$bmi', '', '$tanggal')";

if ($conn->query($sql) === TRUE) {
    echo "Data BMI berhasil disimpan.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>