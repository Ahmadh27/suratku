<?php
require 'function.php';
session_start();

if (isset($_POST['submit'])) {
  if (suratmasuk($_POST) > 0) {
    echo "<script>
      alert('data berhasil ditambahkan');
    </script>";
  } else {
    echo "<script>
    alert ('data gagal ditambahkan');
    </script>";
  }
}

if (isset($_POST['submitke'])) {
  if (suratkeluar($_POST) > 0) {
    echo "<script>
      alert('data berhasil ditambahkan');
    </script>";
  } else {
    echo "<script>
    alert ('data gagal ditambahkan');
    </script>";
  }
}
$ad = $_SESSION["admin"];
$admin = query("SELECT * FROM admin_surat WHERE dep = '$ad'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/input1.css" />
  <link rel="stylesheet" href="style/headside.css" />
  <title>Suratku</title>
</head>

<body>
  <header>
    <div class="right">
      <a href="index.php">
        <div class="nav">
          <img src="img/Books.png" alt="" />
          <h3 id="surat">SuratKu</h3>
        </div>
      </a>
    </div>
  </header>
  <main>
    <section class="container">
      <section id="satu">
        <?php foreach ($admin as $adm) : ?>
          <div class="fot" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
            <img src="img/<?= $adm["foto"]; ?>" alt="error" width="100px" />
            <h3><?= $adm["nama"]; ?></h3>
          </div>
        <?php endforeach; ?>
        <div class="tombol">
          <div class="b1">
            <button class="button" onclick="location.href='suratmasuk.php'">
              <img src="img/masuk.png" alt="" />
              <span>Surat Masuk</span>
            </button>
          </div>
          <div class="b2">
            <button class="button" onclick="location.href='suratkeluar.php'">
              <img src="img/keluar.png" alt="" />
              <span>Surat keluar</span>
            </button>
          </div>
          <div class="b3">
            <button class="button" onclick="location.href='input.php'">
              <img src="img/uploud.png" alt="" />
              <span>Uploud Surat</span>
            </button>
          </div>
        </div>
      </section>
      <section class="content">
        <!-- <div class="sin-out">
          <button id="sin">surat masuk</button>
          <button id="sout">surat keluar</button>
        </div> -->
        <form method="post" id="suratmasuk" enctype="multipart/form-data">
          <h1>Surat masuk</h1>
          <br />
          <div id="menu">
            <div class="menuleft_content">
              <div class="suma">
                <label for="nama">Nama Surat</label>
                <input type="text" id="nama" name="nama" />
              </div>
              <div class="suma">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" />
              </div>
              <div class="suma">
                <label for="nsm">No Surat Masuk</label>
                <input type="text" id="nsm" name="nsm" placeholder="Tulis balasan anda" />
              </div>
              <!-- <div class="suma">
                <label for="">Asal Surat</label>
                <input type="text" id="asal" name="asal" placeholder="Tulis balasan anda" />
              </div> -->
              <div class="suma">
                <label for="tanggalTerima">Tanggal Terima</label>
                <input type="date" id="tanggalTerima" name="terima" placeholder="Tulis balasan anda" />
              </div>
              <div class="k" style="color: white; align-items: center; font-size:14px;">
                <label for="">Tujuan Surat</label><br>
                <input type="radio" value="Pendis" name="tipe1" /><span> Pendis </span>
                <input type="radio" value="PHU" name="tipe1" /><span> PHU </span>
                <input type="radio" value="Keuangan" name="tipe1" /><span> Keuangan </span>
              </div>
            </div>
            <div class="menuright_content">
              <div class="suma">
                <label for="perihal">Perihal Surat</label>
                <textarea id="perihal" name="perihal"></textarea>
              </div>
              <div class="k" style="color: white; align-items: center; font-size:14px;">
                <label for="">Type Surat</label><br>
                <input type="radio" value="pdf" name="tipe" /><span> pdf </span>
                <input type="radio" value="docx" name="tipe" /><span> docx </span>
                <input type="radio" value="pptx" name="tipe" /><span> pptx </span>
                <input type="radio" value="excel" name="tipe" /><span> excel </span>
              </div>
              <div class="suma1">
                <div class="file">
                  <label for="file">File Dokumen</label>
                  <input type="file" id="file" name="file" />
                </div>
                <button id="submit" type="submit" name="submit">Submit</button>
              </div>
            </div>
          </div>
        </form>
        <!-- <form method="post" id="suratkeluar" enctype="multipart/form-data" action="">
          <h1>Surat Keluar</h1>
          <br />
          <div id="menu">
            <div class="menuleft_content">
              <div class="suma">
                <label for="nama">Nama Surat</label>
                <input type="text" id="nama" name="namake" />
              </div>
              <div class="suma">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggalke" />
              </div>
              <div class="suma">
                <label for="nsm">No Surat Masuk</label>
                <input type="text" id="nsm" name="nsmke" placeholder="Tulis balasan anda" />
              </div>
              <div class="suma">
                <label for="">Tujuan / Penerima Surat</label>
                <input type="text" id="" name="tujuan" placeholder="Tulis balasan anda" />
              </div>
            </div>
            <div class="menuright_content">
              <div class="suma">
                <label for="perihal">Perihal Surat</label>
                <textarea name="perihalke" id="perihal"></textarea>
              </div>
              <div class="k" style="color: white; align-items: center; font-size:14px;">
                <label for="">Tujuan Surat</label><br>
                <input type="radio" value="Pendis" name="tipe" /><span> Pendis </span>
                <input type="radio" value="PHU" name="tipe" /><span> PHU </span>
                <input type="radio" value="Keuangan" name="tipe" /><span> Keuangan </span>
              </div>
              <div class="k" style="color: white; align-items: center; font-size:14px;">
                <label for="">Type Surat</label><br>
                <input type="radio" value="pdf" name="tipeke" /><span> pdf </span>
                <input type="radio" value="docx" name="tipeke" /><span> docx </span>
                <input type="radio" value="pptx" name="tipeke" /><span> pptx </span>
                <input type="radio" value="excel" name="tipeke" /><span> excel </span>
              </div>
              <div class="suma1">
                <div class="file">
                  <label for="file">File Dokumen</label>
                  <input type="file" id="file" name="file" />
                </div>
                <button id="submit" name="submitke" type="submit">Submit</button>
              </div>
            </div>
          </div>
        </form> -->
      </section>
    </section>
  </main>
  <footer></footer>
  <script src="main.js"></script>
</body>

</html>