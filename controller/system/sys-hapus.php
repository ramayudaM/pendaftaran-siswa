<?php

    include('../connect.php');
    session_start();

    // menghapus semua data pendaftar
    if (isset($_GET['action']) && $_GET['action'] == 'hapus') {
        $id_pendaftar = $_GET['id'];
        $query_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar WHERE id_pendaftar = '$id_pendaftar'");

        if (mysqli_num_rows($query_pendaftar)){
            $data_pendaftar = mysqli_fetch_array($query_pendaftar);
            $id_user = $data_pendaftar['id_user'];

            // hapus data nilai
            $sql_hapus_nilai = mysqli_query($conn, "DELETE FROM nilai WHERE id_pendaftar = '$id_pendaftar'");

            // hapus foto pendaftar dan data pendaftar
            unlink('../../uploads/'. $data_pendaftar['foto']);
            $sql_hapus_pendaftar = mysqli_query($conn, "DELETE FROM pendaftar WHERE id_pendaftar = '$id_pendaftar'");

            // hapus data user
            $sql_hapus_user = mysqli_query($conn," DELETE FROM user where id_user = '$id_user'");

            // cek apakah data berhasil di hapus
            if($sql_hapus_nilai || $sql_hapus_pendaftar || $sql_hapus_user) {
                $_SESSION['hapus_success'] = "Data pendaftar berhasil dihapus";
                header('location:../../view/dash-admin/?page=data');
            }
            
        }

    }

?>