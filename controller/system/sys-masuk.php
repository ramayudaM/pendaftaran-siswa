<?php

    // connect database
    include('../connect.php');

    // memulai session
    session_start();

    if (isset($_POST['masuk'])) {

        // variabel input
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        // mengecek ketersediaan email dan password
        $sql_user = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
        $result_user = mysqli_query($conn, $sql_user);

        if (mysqli_num_rows($result_user) > 0) {
            // var_dump($result_user); die;
            
            // jika data tersedia, simpan data kedalam session
            while ($data_user = mysqli_fetch_array($result_user)) {
                
                $_SESSION['status'] = 'login';
                $_SESSION['id_user'] = $data_user['id_user'];
                $_SESSION['email'] = $data_user['email'];
                $_SESSION['level'] = $data_user['level'];

                if ($data_user['level'] == siswa) {
                    header('location:../../view/dash-siswa');
                } else if ($data_user['level'] == admin) {
                    header('location:../../view/dash-admin');
                }
            }

        } else {

            // jika data tidak tersedia, kembali ke masuk.php
            $_SESSION['text_masuk'] = 'Username atau password anda salah!';
            header('location:../../view/auth/masuk.php');
        }

    } else {
        header('location:../../view/auth/masuk.php');
    }

?>