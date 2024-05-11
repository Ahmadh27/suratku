<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/post.css" />
    <title>Suratku</title>
  </head>
  <body>
    <header>
      <div class="right">
        <div class="nav">
          <img src="img/kemenag.png" alt="" />
          <h3 id="surat">SuratKu</h3>
        </div>
        <div class="nav2">
          <a href=""><img src="img/notif.png" alt="" /></a>
          <a href=""><img src="img/logout.png" alt="" /></a>
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
              <div class="menuleft_content">
                <div class="suma">
                  <img src="img/word.png" alt="" />
                </div>
                <div class="suma">
                  <label for="tanggal">Tanggal</label>
                  <input type="date" id="tanggal" />
                </div>
                <div class="suma">
                  <label for="nsm">No Surat Masuk</label>
                  <input
                    type="text"
                    id="nsm"
                    placeholder="Tulis balasan anda"
                  />
                </div>
                <div class="suma">
                  <label for="">Asal Surat</label>
                  <input type="text" id="" placeholder="Tulis balasan anda" />
                </div>
                <div class="suma">
                  <label for="tanggalTerima">Tanggal Terima</label>
                  <input
                    type="date"
                    id="tanggalTerima"
                    placeholder="Tulis balasan anda"
                  />
                </div>
              </div>
              <div class="menuright_content">
                <div class="suma" style="height: 100%;">
                  <label for="perihal">Perihal Surat</label>
                  <textarea name="" id="perihal" cols="100" rows="10"></textarea>
                </div>
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
