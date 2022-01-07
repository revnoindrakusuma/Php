<?php
require 'functions.php';
session_start();



if( isset($_POST["submit"]) ){


    //cek apakah data berhasil ditambahkan atau tidak

    if( tambah($_POST) > 0 ){
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = 'index.php';
        </script>
        ";
    } else{
        echo "
        <script>
             alert('data gagal ditambahkan!');
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
    <title>Tambah data Alumni</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<a href="index.php"><p style="color: white; font-style: normal;">Kembali</p></a>
    <div class="container">
    <h1>Tambah Data Alumni</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Nama">Nama :</label><br>
                <input type ="text" name="Nama" id="Nama"
                required>
            </li>
            <li>
                <label for="Nisn">Nisn :</label><br>
                <input type ="text" name="Nisn" id="Nisn">
            </li>
            <li>
                <label for="Jurusan">Jurusan :</label><br>
                <input type ="text" name="Jurusan" id="Jurusan"
                required>
            </li>
            <li>
                <label for="Email">Email :</label><br>
                <input type ="text" name="Email" id="Email"
                required>
            </li>
            <li>
                <label for="Pekerjaan">Pekerjaan :</label><br>
                <input type ="text" name="Pekerjaan" id="Pekerjaan"
                required>
            </li>
            <li>
                <label for="Tahun_Angkatan">Tahun Angkatan :</label>
                <input type ="text" name="Tahun_Angkatan" id="Tahun_Angkatan">
            </li>
            <li>
                <label for="Tanggal_Lahir">Tanggal Lahir :</label>
                <input type ="text" name="Tanggal_Lahir" id="Tanggal_Lahir"
                required>
            </li>
            <li>
                <label for="Alamat_Rumah">Alamat Rumah :</label>
                <input type ="text" name="Alamat_Rumah" id="Alamat_Rumah"
                required>
            </li>
            <li>
                <label for="Gambar">Gambar :</label>
                <input type ="file" name="Gambar" id="Gambar">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    
    </form>
    </div>
</body>
</html>