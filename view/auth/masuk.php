<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | PPDB Online</title>
    <script src="https://kit.fontawesome.com/6ea8b75cf5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../assets/css/alert.css">
    <link rel="stylesheet" href="../../assets/css/auth.css">
</head>
<body>
    
    <header class="back">
        <a href="../../index.php"><i class="fa-solid fa-arrow-left"></i></a>
    </header>

    <main>

        <header class="logo">
            <h4>PPDB ONLINE</h4>
        </header>

        <form action="../../controller/system/sys-masuk.php" method="POST" onsubmit="return validasi()">

            <header>
                <h1>Sign In</h1>
                <p>Selamat Datang! Masukkan akun anda</p>
            </header>

            <?php
                session_start();

                if (isset($_SESSION['text_daftar'])) { ?>
                
                <div class="info-text success">
                    <p><?= $_SESSION['text_daftar']?></p>
                    <i class="fa-solid fa-xmark"></i>
                </div>

            <?php }

                if (isset($_SESSION['text_masuk'])) { ?>
                
                <div class="info-text error">
                    <p><?= $_SESSION['text_masuk']?></p>
                    <i class="fa-solid fa-xmark"></i>
                </div>

            <?php } session_destroy();?>

            <section>
                <div class="field">
                    <div class="input-wrap">
                        <div class="input-area">
                            <input type="text" name="email" id="email">
                            <label for="email">Email</label>
                        </div>
                        <div class="error-text">Email tidak boleh kosong</div>
                    </div>

                    <div class="input-wrap">
                        <div class="input-area">
                            <input type="password" name="password" id="password">
                            <label for="password">Password</label>
                            <div class="show-hide">
                                <i class="fa-solid fa-eye-slash" id="hide"></i>
                                <i class="fa-solid fa-eye" id="show"></i>
                            </div>
                        </div>
                        <div class="error-text">Password tidak boleh kosong</div>
                    </div>
                </div>

                <div class="auth-btn">
                    <button type="submit" name="masuk" value="masuk">Masuk</button>
                    <p>Belum memiliki akun? <a href="daftar.php">Daftar</a> </p>
                </div>
            </section>
        </form>
    </main>

    <script src="../../assets/js/auth/masuk.js"></script>
</body>
</html>