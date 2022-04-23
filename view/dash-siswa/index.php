<?php 
    include('../../controller/connect.php');
    session_start(); 
?>

<?php
    // cek apakah user sudah login atau belum
    if (isset($_SESSION['status']) && $_SESSION['status'] == 'login') {
        // jika sudah login, maka lanjut
        if (isset($_SESSION['level']) && $_SESSION['level'] == 'siswa') {

        } else {
            header('location:../dash-admin/');
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
                if ($p == 'home') {
                    echo "Home";
                    // echo "Home". $_SESSION['email'];
                } else if ($p == 'profile'){
                    echo "Profile";
                } else if ($p == 'form') {
                    echo "Form";
                } else if ($p == 'nilai') {
                    echo "Nilai";
                }
            } else {
                echo "Home";
            }
        ?>
    </title>

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/alert.css">
    <link rel="stylesheet" href="../../assets/css/nav.css">

    <?php
        @$s = $_GET['page'];
        
        if (!empty($s)) {
            if ($s == 'home') { ?>
                    <link rel="stylesheet" href="../../assets/css/dash-siswa/home.css">
                <?php } else if ($s == 'profile') {?>
                    <link rel="stylesheet" href="../../assets/css/dash-siswa/profile.css">
                <?php } else if ($s == 'form') { ?>
                    <link rel="stylesheet" href="../../assets/css/dash-siswa/form.css">
                <?php } else if ($s == 'nilai') { ?>
                    <link rel="stylesheet" href="../../assets/css/dash-siswa/nilai.css">
                <?php }
        } else { ?>
            <link rel="stylesheet" href="../../assets/css/dash-siswa/home.css">
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
                <a href="?page=home">
                    <i class="material-icons-sharp">home</i>
                    <h4>Home</h4>
                </a>
                
                <?php
                    $id_user = $_SESSION['id_user'];

                    $check_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar WHERE id_user = '$id_user' AND foto != ''");
                    if (mysqli_fetch_array($check_pendaftar)) { ?>

                    <a href="?page=profile">
                        <i class="material-icons-sharp">person</i>
                        <h4>Profile</h4>
                    </a>
                <?php } else { ?>
                    <a class="disable">
                        <i class="material-icons-sharp">person</i>
                        <h4>Profile</h4>
                    </a>
                <?php }?>

                <a href="?page=form">
                    <i class="material-icons-sharp">post_add</i>
                    <h4>Form</h4>
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
                    case 'home':
                        include "page/home.php";
                        break;
                    
                    case 'profile';
                        include "page/profile.php";
                        break;
                    
                    case 'form';
                        include "page/form.php";
                        break;

                    default:
                        include "page/home.php";
                        break;
                }

            }else {
                include "page/home.php";
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