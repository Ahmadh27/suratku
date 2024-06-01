<?php

require 'function.php';

$id = $_GET["id"];

$suratmasuk = query("SELECT * FROM suratmasuk where id = $id ");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/post1.css" />
  <title>Suratku</title>
</head>

<body>
  <header>
    <div class="right">
      <div class="nav">
        <img src="img/kemenag.png" alt="" />
        <h3 id="surat">SuratKu</h3>
      </div>
    </div>
  </header>
  <main>
    <section class="container">
      <section id="satu">
        <img src="img/Ellipse.png" alt="error" />
        <h3>Fulan fulan</h3>
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
        <section id="suratmasuk">
          <h1>Surat masuk</h1>
          <br />
          <div id="menu">
            <?php foreach ($suratmasuk as $row) : ?>
              <div class="menuleft_content">
                <div class="suma">
                  <?php if ($row['tipe'] == 'pdf') : ?>
                    <img src="img/pdf.png" class="imgpost" alt="">
                  <?php elseif ($row['tipe'] == 'docx') : ?>
                    <img src="img/word.png" class="imgpost" alt="">
                  <?php elseif ($row['tipe'] == 'pptx') : ?>
                    <img src="img/ppt.png" class="imgpost" alt="">
                  <?php elseif ($row['tipe'] == 'excel') : ?>
                    <img src="img/excel.png" class="imgpost" alt="">
                  <?php endif; ?>
                </div>
                <div class="suma">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" id="tanggal" value="<?php echo $row['tanggal'] ?>" />
                </div>
                <div class="suma">
                  <label for="nsm">No Surat Masuk</label>
                  <input type="text" id="nsm" placeholder="Tulis balasan anda" value="<?php echo $row['nosuma'] ?>" />
                </div>
                <div class="suma">
                  <label for="">Asal Surat</label>
                  <input type="text" id="" placeholder="Tulis balasan anda" value="<?php echo $row['asal'] ?>" />
                </div>
                <div class="suma">
                  <label for="tanggalTerima">Tanggal Terima</label>
                  <input type="date" id="tanggalTerima" placeholder="Tulis balasan anda" value="<?php echo $row['terima'] ?>" />
                </div>
              </div>
              <div class="menuright_content">
                <div class="suma" style="height: 100%;">
                  <label for="perihal">Perihal Surat</label>
                  <div class="perihal"><?php echo $row['perihal'] ?></div>
                </div>
              <?php endforeach; ?>
              </div>
          </div>
        </section>
      </section>
    </section>
  </main>
  <footer></footer>
  <script src="main.js"></script>
</body>

</html>