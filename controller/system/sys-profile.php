<?php
    include('../../controller/connect.php');

    $id_user = $_SESSION['id_user'];

    $sql_pendaftar = "SELECT * FROM pendaftar WHERE id_user = '$id_user'";
    $result_pendaftar = mysqli_query($conn, $sql_pendaftar);

    if (mysqli_num_rows($result_pendaftar)) {

        $data_pendaftar = mysqli_fetch_array($result_pendaftar);
        $id_pendaftar = $data_pendaftar['id_pendaftar'];

        $sql_nilai = "SELECT * FROM nilai WHERE id_pendaftar = '$id_pendaftar'";
        $result_nilai = mysqli_query($conn, $sql_nilai);

        if (mysqli_num_rows($result_nilai)) {

            $data_nilai = mysqli_fetch_array($result_nilai);
            $status = $data_nilai['status'];

        }

        // simpan data nilai
        if (isset($_POST['simpan_nilai']) && $_POST['simpan_nilai'] == 'simpan_nilai') {
        
            $nilai_us = $_POST['nilai_us'];
            $nilai_un = $_POST['nilai_un'];
    
            $sql_nilai = "INSERT INTO nilai (nilai_us, nilai_un, status, id_pendaftar) VALUE ('$nilai_us', '$nilai_un', '0', '$id_pendaftar')";
            $result_pendaftar = mysqli_query($conn, $sql_nilai);
    
            if ($result_pendaftar) {
                // jika simpan data nilai berhasil
                header ('location:../../view/dash-siswa/?page=profile');
            }
        }
        
    }

?>