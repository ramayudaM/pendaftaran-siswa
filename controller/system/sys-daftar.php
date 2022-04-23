<?php

    // connect database
    include('../connect.php');
    
    // memulai session
    session_start();

    if (isset($_POST['daftar'])) {

        // variabel input
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // konfirmasi ketersediaan email
        $check_email = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

        if (mysqli_fetch_array($check_email)) {
            $_SESSION['check_email'] = 'Email sudah ditemukan, silahkan login atau gunakan email lain';
            header('location:../../view/auth/daftar.php');
            return false;
        }

        // tambahkan data baru pada table user
        $user = "INSERT INTO user (email, password, level) VALUES ('$email', '$password', 'siswa')";
        $result_user = mysqli_query($conn, $user);

        if ($result_user) {
            $_SESSION['text_daftar'] = 'Akun berhasil didaftarkan silahkan login untuk melanjutkan';
            header('location:../../view/auth/masuk.php');
        }

    } else {
        header('location:../../view/auth/daftar.php');
    }

?>