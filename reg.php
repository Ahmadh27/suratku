<?php 

require 'function.php';
if (isset($_POST["daftar"])) {
  if (registrasi($_POST)> 0){
    echo"<script>
    alert('berhasil daftar');
    </script>";
  }
  else {
    echo mysqli_error($conect);
  }
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/login.css" />
    <title>registrasi</title>
  </head>
  <body>
      <div class="container">
        <div class="login">
            <div class="hider">
                <img src="img/kemenag.png" alt="" />
                <h1>Welcome</h1>
            </div>
            <div class="form-login">
                <form action="" method="post" enctype="multipart/form-data" >
                  <label for="username">Username</label>
                  <input type="text" name="username" id="username" />
                  <label for="password">Password</label>
                  <input type="password" name="pass1" id="password"></label>
                  <label for="password1">Password</label>
                  <input type="password" name="pass2" id="password1"></label>
                  <label for="file">Foto</label>
                  <input type="file" id="file" name="file" >
                  <button type="submit" name="daftar">Daftar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
