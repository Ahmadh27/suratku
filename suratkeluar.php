<?php

require 'function.php';

$suratkeluar = query("SELECT * FROM suratkeluar ORDER BY id DESC ");


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sumasuk2.css">
    <title>SuratKeluar</title>
</head>

<body>
    <header>
        <div class="right">
            <div class="nav">
                <img src="img/kemenag.png" alt="">
                <h3>SuratKu</h3>
            </div>
            <div class="nav2">
                <a href=""><img src="img/notif.png" alt=""></a>
                <a href=""><img src="img/logout.png" alt=""></a>
            </div>
        </div>
    </header>
    <main>
        <section id="satu">
            <img src="img/Ellipse.png" alt="error">
            <h3>Fulan fulan</h3>
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
            <h1>Surat Keluar</h1><br>
            <div id="menu">
                <div class="suma">
                    <div class="suma1">
                        <?php foreach ($suratkeluar as $row) : ?>
                            <div class="menu1">
                                <div class="User">
                                    <img src="img/Ellipse.png" alt="">
                                    <p>User</p>
                                </div>
                                <?php if ($row['tipeke'] == 'pdf') : ?>
                                 <img src="img/pdf.png" class="imgpost" alt="">
                                <?php elseif ($row['tipeke'] == 'docx') : ?>
                                <img src="img/word.png" class="imgpost" alt="">
                                <?php elseif ($row['tipeke'] == 'pptx') : ?>
                                <img src="img/ppt.png" class="imgpost" alt="">
                                <?php elseif ($row['tipeke'] == 'excel') : ?>
                                <img src="img/excel.png" class="imgpost" alt="">
                                <?php endif; ?>
                                <h3><?= $row["nama"]; ?></h3>
                                <h4><?= $row["tanggal"]; ?></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>