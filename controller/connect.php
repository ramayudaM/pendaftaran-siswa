<?php

    // koneksi menuju database db_pendaftaran
    $conn = mysqli_connect('localhost', 'root', '', 'db_pendaftaran');

    // mengecek apakah koneksi terhubung
    if ($conn->connect_error){
        echo "Koneksi Gagal". mysqli_connect_error();
        exit();
    }

?>