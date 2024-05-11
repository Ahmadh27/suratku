<?php

session_start();

require 'function.php';


//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  //ambil username berdasarkan id
  $result = mysqli_query($conect, "SELECT username FROM admin_surat WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}


//cek sesion
if (isset($_SESSION["login"])) {
  header("Location: index.php");
  exit();
}


if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["passwordlogin"];

  $result = mysqli_query($conect, "SELECT * FROM admin_surat WHERE username = '$username' ");
// 
  //cek username
  if (mysqli_num_rows($result) === 1) {
    // echo ($error);

    //cek password 
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      //set session
      $_SESSION["login"] = true;

      //cek remember me
      if (isset($_POST["remember"])) {
        //buat cookie

        setcookie('id', $row['id'], time() + 86400);
        setcookie('key', hash('sha256', $row["username"]), time() + 86400);
      }

      header("Location: index.php");
      exit();
    }
  }


  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/login.css" />
  <title>login</title>
</head>

<body>
  <div class="container">
    <div class="login">
      <div class="hider">
        <img src="img/kemenag.png" alt="" />
        <h1>Welcome</h1>
      </div>
      <div class="form-login">
        <form action="" method="post">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" />
          <label for="password">Password</label>
          <input type="password" id="password" name="passwordlogin"></label>
          <label for="remember" >Remember Me</label>
          <input type="checkbox" name="remember" id="remember" checked >
          <button type="submit" name="login" >Login</button>

          <?php if (isset($error)) : ?>
            <span>username / password salah</span>
          <?php endif; ?>

        </form>
      </div>
    </div>
  </div>
</body>

</html>