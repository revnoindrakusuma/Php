<?php
session_start();

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE
    id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if( $key === hash('sha256', $row['username']) ) {
        $_SESSION['login'] = true;
    }
}




require 'functions.php';

if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE
    username = '$username'");

    //cek username
    if( mysqli_num_rows($result) ===1 ){
    
        //cek password
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {
            // set session
            $_SESSION["login"] = true;

            //cek remember me
            if( isset($_POST['remember']) ) {
                //set cookie
                setcookie('id', $row['id'], time() +60);
                setcookie('key', hash('sha256', $row['username']));
            }


            header("location: index1.php");
            exit;
        }
    }
    
    $erorr = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<p>belum Memiliki Accout?</p>
  <a href="registrasi.php"><p style="color: white; font-style: italic;">create account</p></a>
<br><br>
<?php if( isset($erorr) ) : ?>
    <p style="color: red; font-style: italic;">
    username / password salah</p>
<?php endif; ?>


<div class = "container">
    <h1>Login</h1>
    <form action="" method="post">

         <ul>
            <li>
                 <label for="username">Username :</label>
                 <input type="text" name="username" id="username">
            </li>
            <li>
                 <label for="password">Password :</label>
                 <input type="password" name="password" id="password">
            </li>
            <li>
                 <input type="checkbox" name="remember" id="remember">
                 <label for="remember">Remember me :</label>
            </li>
            <li>
                 <button type="submit" class="tombol_login" name="login">Login</button>
             </li>

        </ul>
    </form>
</div>

</body>

</html>