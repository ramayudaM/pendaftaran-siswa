<?php 
    include('../../controller/connect.php');
    session_start(); 
?>

<?php
    // cek apakah user sudah login atau belum
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
        if (isset($_SESSION['level']) && $_SESSION['level'] == 'admin') {

        } else {
            header('location:../dash-siswa/');
        }
    } else {
        // jika belum login, maka kembalikan ke halaman index.php
        header('location:../../');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?php
            @$p = $_GET['page'];

            if (!empty($p)) {
                if ($p == 'data') {
                    echo "Data Pendaftar";
                } 
            } else {
                echo "Data Pendaftar";
            }
        ?>
    </title>

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/alert.css">
    <link rel="stylesheet" href="../../assets/css/nav.css">

    <?php
        @$s = $_GET['page'];
        
        if (!empty($s)) {
            if ($s == 'data') { ?>
                    <link rel="stylesheet" href="../../assets/css/dash-admin/data.css">
                <?php }
        } else { ?>
            <link rel="stylesheet" href="../../assets/css/dash-admin/data.css">
        <?php } ?>

</head>
<body>
    <main>
        <aside>
            <div class="top">
                <div class="logo">
                    <h3>PPDB ONLINE</h3>
                </div>
                <i class="material-icons-sharp">close</i>
            </div>
            
            <div class="sidebar">
                <a href="?page=data">
                    <i class="material-icons-sharp">home</i>
                    <h4>Data Pendaftar</h4>
                </a>
                <a id="btn-logout">
                    <i class="material-icons-sharp">logout</i>
                    <h4>Logout</h4>
                </a>
            </div>
        </aside>
        <section class="behind-aside"><!-- virtual content --></section>

        <?php
            @$page = $_GET['page'];

            if(!empty($page)){

                switch ($page) {
                    case 'data':
                        include "page/data.php";
                        break;
                    
                    default:
                        include "page/data.php";
                        break;
                }

            }else {
                include "page/data.php";
            }
        ?>
    </main>
    
    <div class="logout">
        <div class="text">
            <i class="material-icons-sharp">info</i>
            <h3>Apakah Anda ingin logout?</h3>
            <p>Semua perubahan akan tersimpan dan Anda akan keluar dari akun <?= $_SESSION['email'];?></p>
        </div>
        
        <div class="button">
            <a id="batal-logout">Batal</a>
            <a href="../../controller/system/sys-logout.php">Logout</a>
        </div>
    </div>

    <script src="../../assets/js/alert.js"></script>
    <script src="../../assets/js/nav.js"></script>
</body>
</html>