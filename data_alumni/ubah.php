<?php
require 'functions.php';
session_start();

if ( !isset($_SESSION["login"]) ) {
    header("location: login.php");
    exit;
}


// ambil data di url
$id = $_GET["id"];


// query data siswa berdasarkan id
$sws = query("SELECT * FROM siswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belom
if( isset($_POST["submit"]) ) {

    // cek apakah data berhasil di ubah atau tidak
    if( ubah($_POST) > 0 ){
        echo "
             <script>
                 alert('data berhasil diubah!');
                 document.location.href = 'index.php';
             </script>
        ";
    } else {
        echo "
             <script>
                 alert('data gagal diubah!');
                 document.location.href = 'index.php';
             </script>
        ";
    }

    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ubah data Alumni</title>
    <link rel="stylesheet" href="style4.css">
 </head>
 <body>
 <a href="index.php"><p style="color: white; font-style: normal;">Kembali</p></a>
 <div class="container">
 <h1>ubah Data Alumni</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $sws["id"]; ?>">
        <input type="hidden" name="gambarLama" value="<?= $sws["Gambar"]; ?>">
        <ul>
            <li>
                <label for="Nama">Nama :</label><br>
                <input type ="text" name="Nama" id="Nama"
                required value="<?= $sws["Nama"]; ?>">
            </li>
            <li>
                <label for="Nisn">Nisn :</label><br>
                <input type ="text" name="Nisn" id="Nisn"
                value="<?= $sws["Nisn"]; ?>">
            </li>
            <li>
                <label for="Jurusan">Jurusan :</label><br>
                <input type ="text" name="Jurusan" id="Jurusan"
                required value="<?= $sws["Jurusan"]; ?>">
            </li>
            <li>
                <label for="Email">Email :</label><br>
                <input type ="text" name="Email" id="Email"
                required value="<?= $sws["Email"]; ?>">
            </li>
            <li>
                <label for="Pekerjaan">Pekerjaan :</label><br>
                <input type ="text" name="Pekerjaan" id="Pekerjaan"
                required value="<?= $sws["Pekerjaan"]; ?>">
            </li>
            <li>
                <label for="Tahun_Angkatan">Tahun Angkatan :</label><br>
                <input type ="text" name="Tahun_Angkatan" id="Tahun_Angkatan"
                value="<?= $sws["Tahun Angkatan"]; ?>">
            </li>
            <li>
                <label for="Tanggal_Lahir">Tanggal Lahir :</label><br>
                <input type ="text" name="Tanggal_Lahir" id="Tanggal_Lahir"
                required value="<?= $sws["Tanggal Lahir"]; ?>">
            </li>
            <li>
                <label for="Alamat_Rumah">Alamat Rumah :</label><br>
                <input type ="text" name="Alamat_Rumah" id="Alamat_Rumah"
                required value="<?= $sws["Alamat Rumah"]; ?>">
            </li>
            <li>
                <label for="Gambar">Gambar :</label><br>
                <img src="img/<?= $sws["Gambar"]; ?>" width="50"> <br>
                <input type ="file" name="Gambar" id="Gambar">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data!</button>
            </li>
        </ul>
    
    </form>
</div>
</body>
</html>