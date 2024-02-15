<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./styles/tampilan.css" />
</head>

<body>
    <header>
        <ul>

            <li>
                <a href="hasilupload.php">Home</a>
                <a href="upload.php">Tambah Produk</a>
            </li>
        </ul>
    </header>
    <?php
    include 'koneksi.php';
    $gallery = mysqli_query($koneksi_db, "SELECT * FROM event");
    while ($hasil = mysqli_fetch_array($gallery)) {
    ?>
        <div class="box-produk">
            <img src="gallery/<?php echo $hasil['foto_event']  ?>">
            <?php echo $hasil['nama_event'] . "<br><br>"; ?>
            <?php echo $hasil['deskripsi']; ?>
        </div>
    <?php } ?>
</body>

</html>