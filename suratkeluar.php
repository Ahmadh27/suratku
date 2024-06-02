<?php
session_start();
require 'function.php';
$ap = $_SESSION["admin"];
$suratkeluar = query("SELECT * FROM suratmasuk where tujuan = '$ap' ORDER BY id DESC ");
$admin = query("SELECT * FROM admin_surat WHERE dep = '$ap'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/sumasuk3.css">
    <link rel="stylesheet" href="style/headside.css">
    <title>SuratKeluar</title>
</head>

<body>
    <header>
        <div class="right">
            <a href="index.php">
                <div class="nav">
                    <img src="img/kemenag.png" alt="">
                    <h3>SuratKu</h3>
                </div>
            </a>
        </div>
    </header>
    <main>
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
                            <a href="<?php echo '/praktik1/post.php?id=' . $row["id"] ?> ">
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
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
</body>

</html>