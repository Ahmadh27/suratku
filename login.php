<?php

session_start();

include 'function.php';

// if (isset($_POST['username'])) {
//   $username = $_POST['username'];
//   $password = md5($_POST['password']);

//   $query = mysqli_query($conect, "SELECT * FROM admin_surat WHERE username = '$username' AND password = '$password'");
//   $value = mysqli_query($conect, "SELECT foto FROM admin_surat WHERE username = '$username' AND password = '$password'");
//   // echo "<script>localStorage.setItem('key', '$value');</script>";
//   // echo `$value`;


//   if (mysqli_num_rows($query) > 0) {
//     $data = mysqli_fetch_array($query);
//     $_SESSION['admin'] = $data;
//     echo '<script>
//               alert("berhasil login, ' . $data['nama'] . '");
//               location.href="index.php";
//           </script>';
//   } else {
//     echo '<script>
//               alert("username atau password salah");
//               location.href="login.php";
//           </script>';
//   }
// }

$er = "";

if (isset($_POST["login"])) {
  $user = $_POST["username"];
  $pass = $_POST["password"];
  $query = mysqli_query($conect, "SELECT * FROM admin_surat WHERE username = '$user' AND password = '$pass'");

  // echo "$query";

  foreach ($query as $row) {
    $_SESSION['admin'] = $row["dep"];
  }

  if (mysqli_num_rows($query) > 0) {
    header("location: index.php");
  } else {
    $er = "Password atau Username Anda Salah";
  }
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
        <img src="img/Books.png" alt="" />
        <h1>Welcome</h1>
        <p><?= $er ?></p>
      </div>
      <div class="form-login">

        <form method="post">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required />
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required></label>
          <button type="submit" name="login">Login</button>
        </form>

      </div>
    </div>
  </div>
</body>

</html>