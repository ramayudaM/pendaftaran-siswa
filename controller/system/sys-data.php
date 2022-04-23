<?php

    // table pendaftar
    // $all_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar, nilai WHERE pendaftar.id_pendaftar = nilai.id_pendaftar AND nilai.status = '0' OR nilai.status = '1' OR nilai.status = '2'");
    // table user, pendaftar, dan nilai
    $all_pendaftar = mysqli_query($conn, "SELECT * FROM user, pendaftar, nilai WHERE user.id_user = pendaftar.id_user AND pendaftar.id_pendaftar = nilai.id_pendaftar");

    // cek table pendaftar
    if (!$all_pendaftar) {
        echo "error"; die;
    }

    
    // mengubah status pendaftar
    if (isset($_POST['simpan_status']) && $_POST['simpan_status'] == 'simpan_status') {
        $id_pendaftar = $_POST['id_pendaftar'];
        $status = $_POST['status'];

        $status = mysqli_query($conn, "UPDATE nilai SET status = '$status' WHERE id_pendaftar = '$id_pendaftar'");

        if ($status) {
            header('location:?page=data');
            $_SESSION['data_success'] = 'Status berhasil diubah';
        }
    }

?>