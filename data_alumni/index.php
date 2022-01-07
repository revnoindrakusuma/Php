<?php
session_start();
if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}



require 'functions.php';

//pagination
//konfigurasi
$jumlahDataPerHalaman = 10;
$jumlahData = count(query("SELECT * FROM users"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
$awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - 
$jumlahDataPerHalaman;

$siswa = query("SELECT * FROM siswa LIMIT $awalData, 
$jumlahDataPerHalaman");

//tombol cari ditekan
if ( isset($_POST["cari"]) ) {
    $siswa = cari($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data</title>
</head>
<body>
<a href="login.php">Logout</a>

<h1>Daftar Alumni Siswa-Siswi SMK BINA AM MA'MUR</h1>
<a href="tambah.php">Tambah Data Alumni</a>
<br><br>


<form action="" method="post">

   <input type="text" name="keyword" size="30" autofocus
   placeholder="masukan keyword pencarian.." autocomplete="off">
   <button type="submit" name="cari">cari!</button>

</form>

<br>    
<table border="1" cellpadding= "10" cellspacing="0">

     <tr>
         <th>No.</th>
         <th>Aksi</th>
         <th>Gambar</th>
         <th>Nisn</th>
         <th>Nama</th>
         <th>Tanggal Lahir</th>
         <th>Alamat Rumah</th>
         <th>Jurusan</th>
         <th>Email</th>
         <th>Pekerjaan</th>
         <th>Tahun Angkatan</th>
    </tr>


    <?php $i = $awalData + 1; ?>
    <?php foreach( $siswa as $row ) : ?>
    <tr>
        <td><?= $i ?></td>
        <td>
            <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> 
            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
            return confirm('yakin.?');">hapus</a>
        </td>
        <td><img src="img/<?= $row["Gambar"]; ?>" width="60"></td>
         <td><?= $row ["Nisn"]; ?></td>
         <td><?= $row ["Nama"]; ?></td>
         <td><?= $row ["Tanggal Lahir"]; ?></td>
         <td><?= $row ["Alamat Rumah"]; ?></td>
         <td><?= $row ["Jurusan"]; ?></td>
         <td><?= $row ["Email"]; ?></td>
         <td><?= $row ["Pekerjaan"]; ?></td>
         <td><?= $row ["Tahun Angkatan"]; ?></td>
    </tr>
    <?php $i++; ?>
    <?php endforeach; ?>
</table>

</body>
</html>