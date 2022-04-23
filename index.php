<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB ONLINE</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6ea8b75cf5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>

    <header>
        <nav>
            <div class="logo">
                <h4>PPDB ONLINE</h4>
            </div>

            <div class="nav-links">
                <a href="#link1">Beranda</a>
                <a href="#link2">Cara Mendaftar</a>
                <a href="#link3">Keunggulan</a>
                <a href="#link4">Pengumuman</a>
                <a href="view/auth/masuk.php">Masuk</a>
                <i class="fa-solid fa-xmark" id="close"></i>
            </div>

            <div class="nav-button">
                <a href="view/auth/masuk.php">Masuk</a>
                <i class="fa-solid fa-bars" id="open"></i>
            </div>
        </nav>
    </header>

    <main>
        <section class="hero" id="link1">
            <section class="left-side" data-aos="fade-up">
                <h1>PPDB Online Bandar Lampung</h1>
                <p>Untuk calon pendaftar tahun 2022/2023 bisa mendaftar lewat website ini. Belum memiliki akun? daftar segera disini.</p>
                <a href="view/auth/daftar.php">Daftar</a>
            </section>
            <section class="right-side" data-aos="fade-up">
                <img src="assets/image/main.png" alt="main.png">
            </section>
        </section>
        
        <section class="cara-mendaftar"  id="link2">
            <header data-aos="fade-up">
                <h2>Cara mendaftar</h2>
            </header>
            <section class="boxs">
                <article class="box" data-aos="fade-up">
                    <i class="fa-solid fa-plus"></i>
                    <h4>Buat Akun</h4>
                    <p>Buat akun untuk melanjutkan pendaftaran online.</p>
                </article>
                <article class="box" data-aos="fade-up">
                    <i class="fa-solid fa-pen"></i>
                    <h4>Lengkapi Data</h4>
                    <p>Lengkapi data pada form yang telah disediakan.</p>
                </article>
                <article class="box" data-aos="fade-up">
                    <i class="fa-solid fa-spinner"></i>
                    <h4>Tunggu Verifikasi</h4>
                    <p>Tunggu verifikasi data yang dilakukan oleh sekolah.</p>
                </article>
                <article class="box" data-aos="fade-up">
                    <i class="fa-solid fa-pen-to-square"></i>
                    <h4>Daftar Ulang</h4>
                    <p>Lakukan daftar ulang langsung ke Sekolah.</p>
                </article>
            </section>
        </section>
    </main>

    <footer>
        <h3>PPDB ONLINE Bandar Lampung</h3>
        <p>&copy; 2022</p>
    </footer>

    <script src="assets/js/main.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>