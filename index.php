<?php

session_start();

if (!isset($_SESSION["admin"])) {
    header("location: login.php");
}

require 'function.php';
$ad = $_SESSION["admin"];

$suratmasuk = query("SELECT * FROM suratmasuk where dep = '$ad' ORDER BY id DESC LIMIT 4");
$suratkeluar = query("SELECT * FROM suratkeluar where dep = '$ad' ORDER BY id DESC LIMIT 4");

$admin = query("SELECT * FROM admin_surat WHERE dep = '$ad'");
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/index4.css">
    <title>Suratku</title>
</head>

<body>
    <header>
        <div class="right">
            <div class="nav">
                <img src="img/kemenag.png" alt="">
                <h3 id="surat">SuratKu</h3>
            </div>
        </div>
    </header>
    <main>
        <section id="satu">
            <?php foreach ($admin as $adm) : ?>
                <div style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
                    <img src="img/<?= $adm["foto"]; ?>" alt="error" width="100px">
                    <h3><?= $adm["nama"]; ?></h3>
                </div>
            <?php endforeach; ?>
            <div class="tombol">
                <div class="b1">
                    <button class="button" onclick="location.href='suratmasuk.php'">
                        <img src="img/masuk.png" alt="">
                        <span>Surat Masuk</span>
                    </button>
                </div>
                <div class="b2">
                    <button class="button" onclick="location.href='suratkeluar.php'">
                        <img src="img/keluar.png" alt="">
                        <span>Surat keluar</span>
                    </button>
                </div>
                <div class="b3">
                    <button class="button" onclick="location.href='input.php'">
                        <img src="img/uploud.png" alt="">
                        <span>Uploud Surat</span>
                    </button>
                </div>
            </div>
        </section>
        <section id="suratmasuk">
            <h1>Surat masuk</h1><br>
            <div id="menu">
                <div class="suma" id="box">
                    <?php foreach ($suratmasuk as $row) : ?>
                        <div class="menu1">
                            <div class="User">
                                <img src="img/Ellipse.png" alt="">
                                <p>User</p>
                            </div>
                            <?php if ($row['tipe'] == 'pdf') : ?>
                                <img src="img/pdf.png" class="imgpost" alt="">
                            <?php elseif ($row['tipe'] == 'docx') : ?>
                                <img src="img/word.png" class="imgpost" alt="">
                            <?php elseif ($row['tipe'] == 'pptx') : ?>
                                <img src="img/ppt.png" class="imgpost" alt="">
                            <?php elseif ($row['tipe'] == 'excel') : ?>
                                <img src="img/excel.png" class="imgpost" alt="">
                            <?php endif; ?>

                            <h3><?= $row["nama"]; ?></h3>
                            <h4><?= $row["tanggal"]; ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <section id="suratkeluar">
            <h1>Surat Keluar</h1><br>
            <div id="menu2">
                <div class="suke">
                    <?php foreach ($suratkeluar as $pow) : ?>
                        <div class="menu1">
                            <div class="User">
                                <img src="img/Ellipse.png" alt="">
                                <p>User</p>
                            </div>
                            <?php if ($pow['tipeke'] == 'pdf') : ?>
                                <img src="img/pdf.png" class="imgke" alt="">
                            <?php elseif ($pow['tipeke'] == 'docx') : ?>
                                <img src="img/word.png" class="imgke" alt="">
                            <?php elseif ($pow['tipeke'] == 'pptx') : ?>
                                <img src="img/ppt.png" class="imgke" alt="">
                            <?php elseif ($pow['tipeke'] == 'excel') : ?>
                                <img src="img/excel.png" class="imgke" alt="">
                            <?php endif; ?>
                            <h3><?= $pow["nama"]; ?></h3>
                            <h4><?= $pow["tanggal"]; ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

    </main>
    <footer>

    </footer>
    <script src="main.js"></script>
</body>

</html>