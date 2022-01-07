<?php
$conn = mysqli_connect("localhost", "root", "", "data_alumni");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows [] = $row;
    }
    return $rows;
}


function tambah ($data){
    global $conn;

    $Nama = htmlspecialchars($data["Nama"]);
    $Nisn = htmlspecialchars($data["Nisn"]);
    $Jurusan = htmlspecialchars($data["Jurusan"]);
    $Email = htmlspecialchars($data["Email"]);
    $Pekerjaan = htmlspecialchars($data["Pekerjaan"]);
    $Tahun_Angkatan = htmlspecialchars($data["Tahun_Angkatan"]);
    $Tanggal_Lahir = htmlspecialchars($data["Tanggal_Lahir"]);
    $Alamat_Rumah = htmlspecialchars($data["Alamat_Rumah"]);

    //upload gambar
    $Gambar = upload();
    if( !$Gambar ){
        return false;
    }

    $query = "INSERT INTO siswa
                 VALUES
   ('','$Nama', '$Nisn', '$Jurusan', '$Email', '$Pekerjaan', '$Tahun_Angkatan', 
   '$Tanggal_Lahir', '$Alamat_Rumah', '$Gambar')
";
mysqli_query($conn, $query);

return mysqli_affected_rows($conn);

}

function upload(){

    $namafile = $_FILES['Gambar']['name'];
    $ukuranfile = $_FILES['Gambar']['size'];
    $erorr = $_FILES['Gambar']['error'];
    $tmptName = $_FILES['Gambar']['tmp_name'];

    //cek apakah tidak ada gambar yang diupload
    if( $erorr ===4 ){
        echo "<script>
               alert('pilih gambar terlebih dahulu!');
             </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namafile); 
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if( !in_array($ekstensiGambar,$ekstensiGambarvalid) ) {
        echo "<script>
               alert('yang anda upload bukan gambar!');
             </script>";
             return false;
    }

    //cek jika ukurannya terlalu besar
    if($ukuranfile > 1000000 ){
        echo "<script>
               alert('ukuran gambar terlalu besar!');
             </script>";
        return false;
    }

    //lolos pengecekan gambar siap diupload
    // generate nama gambar baru
    $namafileBaru = uniqid();
    $namafileBaru .= '.';
    $namafileBaru .= $ekstensiGambar;
   
    move_uploaded_file($tmptName,'img/' . $namafileBaru);

    return $namafileBaru;
}


function hapus($query){
    global $conn;
    $file = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM siswa WHERE id='$query'"));
    unlink('img/' . $file["Gambar"]);
    $hapus = "DELETE FROM siswa WHERE id='$query'";
    mysqli_query($conn,$hapus);
    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;
    
     $id = $data['id'];
     $Nama = htmlspecialchars($data['Nama']);
     $Nisn = htmlspecialchars($data['Nisn']);
     $Jurusan = htmlspecialchars($data['Jurusan']);
     $Email = htmlspecialchars($data['Email']);
     $Pekerjaan = htmlspecialchars($data['Pekerjaan']);
     $Tahun_Angkatan = htmlspecialchars($data['Tahun_Angkatan']);
     $Tanggal_Lahir = htmlspecialchars($data['Tanggal_Lahir']);
     $Alamat_Rumah = htmlspecialchars($data['Alamat_Rumah']);
     $gambarLama = htmlspecialchars($data['gambarLama']);
     
     //cek apakah user pilih gambar baru atau lama

     if( $_FILES['Gambar']['error'] === 4 ) {
         $Gambar = $gambarLama;
     } else{
         $Gambar = upload();
     }

     $query = "UPDATE siswa SET
                 Nama = '$Nama',
                 Nisn = '$Nisn',
                 Jurusan = '$Jurusan',
                 Email = '$Email',
                 Pekerjaan = '$Pekerjaan',
                 `Tahun Angkatan` = '$Tahun_Angkatan',
                 `Tanggal Lahir` = '$Tanggal_Lahir',
                 `Alamat Rumah` = '$Alamat_Rumah',
                 Gambar = '$Gambar'
           WHERE id = $id
                 ";
                 

 mysqli_query($conn, $query);
 return mysqli_affected_rows($conn);
 
    
}

function cari($keyword){
    $query = "SELECT * FROM siswa
                WHERE
               Nama Like '%$keyword%' OR
               Nisn Like '%$keyword%' OR
               Email Like '%$keyword%' OR
               Jurusan Like '%$keyword%' 
               ";
    return query($query);
}


function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,$data["password"]);
    $passowrd2 = mysqli_real_escape_string($conn,$data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE 
    username = '$username'");
    if ( mysqli_fetch_assoc($result) ) {
        echo 
            "<script>
                 alert('username yang dipilih sudah terdaftar!')
            </script>";
            return false;
    }

    //cek konfirmasi password
    if( $password !== $passowrd2 ) {
        echo  "<script>
                    alert('konfirmasi password tidak sesuai!');  
               </script>";
            return false;  
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
     mysqli_query($conn, "INSERT INTO users VALUES('', '$username', 
     '$password')");

     return mysqli_affected_rows($conn);
}

?>
