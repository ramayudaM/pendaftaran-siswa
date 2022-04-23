<?php

    $id_user = $_SESSION['id_user'];
    $sql_user = "SELECT * FROM user WHERE id_user = '$id_user'";
    $result_user = mysqli_query($conn, $sql_user);

    if (mysqli_num_rows($result_user)) {

        $data_user = mysqli_fetch_array($result_user);
        $id_user = $data_user['id_user'];

        // simpan data pendaftar
        if (isset($_POST['simpan_form']) && $_POST['simpan_form'] == 'simpan_form') {
            
            // variabel input
            $nama = $_POST['nama'];
            $nisn = $_POST['nisn'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tanggal_lahir = date("Y-m-d", strtotime($_POST['tanggal_lahir']));
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $agama = $_POST['agama'];
            $alamat = $_POST['alamat'];
            $telp = $_POST['telp'];

            $sql_insert_data = "INSERT INTO pendaftar (nama, nisn, tempat_lahir, tanggal_lahir, jenis_kelamin, agama, alamat, telepon, id_user) VALUES ('$nama', '$nisn', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$agama', '$alamat', '$telp', '$id_user')";
            $query_insert_data = mysqli_query($conn, $sql_insert_data);

            if ($query_insert_data) {
                echo "  <div class='alert success'>
                            <div class='text'>
                                <i class='material-icons-sharp'>check_circle</i>
                                <p>Data Anda berhasil tersimpan</p>
                            </div>
                            <span class='material-icons-sharp'>close</span>
                        </div>";
            }

        }

        // simpan gambar pendaftar
        if (isset($_POST['simpan_foto']) == 'simpan_foto'){
            if($_FILES['gambar']['name'] != '') {
                $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
                $nama_gambar = $_FILES['gambar']['name'];
                $x = explode('.', $nama_gambar);
                $ekstensi = strtolower(end($x));
                $ukuran	= $_FILES['gambar']['size'];
                $file_tmp = $_FILES['gambar']['tmp_name'];

                $ubah_nama = $_SESSION['id_user'] . '_pas_foto' . '.' . $ekstensi;

                if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {

                    // ukuran 500 kb
                    if($ukuran < 500000) {
                        move_uploaded_file($file_tmp, '../../uploads/'. $ubah_nama);
    
                        $sql_update_profil = "UPDATE pendaftar set foto = '$ubah_nama' where id_user = '$id_user'";
                        $query_update = mysqli_query($conn, $sql_update_profil);
    
                        if($query_update) {
                            //jika gambar berhasil di upload
                            $_SESSION['form_success'] = "Gambar berhasil di upload";
                            header ('location: ../../view/dash-siswa/?page=profile');
                        }
    
                    } else {
                        // jika ukuran gambar terlalu besar
                        echo "  <div class='alert error shake'>
                                    <div class='text'>
                                        <i class='material-icons-sharp'>check_circle</i>
                                        <p>Ukuran Gambar terlalu besar</p>
                                    </div>
                                    <span class='material-icons-sharp'>close</span>
                                </div>";
                    }
    
                } else {
                    // jika ekstensi tidak diperbolehkan
                    echo "  <div class='alert error shake'>
                                <div class='text'>
                                    <i class='material-icons-sharp'>check_circle</i>
                                    <p>Ekstensi tidak diperbolehkan</p>
                                </div>
                                <span class='material-icons-sharp'>close</span>
                            </div>";
                }
                
            } else {
                // jika tidak ada file yang di upload
                echo "  <div class='alert error shake'>
                            <div class='text'>
                                <i class='material-icons-sharp'>check_circle</i>
                                <p>Gambar tidak boleh kosong</p>
                            </div>
                            <span class='material-icons-sharp'>close</span>
                        </div>";
            } 
        }
    }

?>