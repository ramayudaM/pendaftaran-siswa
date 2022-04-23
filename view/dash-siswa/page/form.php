<?php 
    include('../../controller/connect.php');
?>

<?php include("../../controller/system/sys-form.php");?>

<section class="left">
    <div class="top">
        <h2>Form</h2>
        <div class="date">
            <p><?php 
                $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                echo $date->format("d / m / Y");?></p>
        </div>
    </div>

    <div class="content1">

        <?php
            // cek data pendaftar apakah ada atau belum
            $check_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar WHERE id_user = '$id_user' AND nama IS NOT NULL");

            if (mysqli_fetch_array($check_pendaftar)) { ?>

                <!-- jika data pendaftar sudah ada -->
                <div class="blank">
                    <i class="material-icons-sharp">lock</i>
                    <p>Data anda telah tersimpan dan tidak dapat diubah</p>
                </div>

            <?php  } else { ?>

                <!-- jika data pendaftar belum ada tampilkan form  -->
                <form method="POST" action="?page=form">
                    <div class="input-area full">
                        <label for="nama">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" required>
                    </div>

                    <div class="input-area">
                        <label for="nisn">NISN</label>
                        <input type="text" name="nisn" id="nisn" required>
                    </div>
                    <div class="input-area">
                        <label for="telp">Telepon</label>
                        <input type="text" name="telp" id="telp" required>
                    </div>

                    <div class="input-area">
                        <label for="tempat-lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat-lahir" required>
                    </div>
                    <div class="input-area">
                        <label for="tanggal-lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal-lahir" required>
                    </div>

                    <div class="input-area">
                        <p>Jenis Kelamin</p>
                        <div class="jk">
                            <label for="l">    
                                <input type="radio" name="jenis_kelamin" id="l" value="laki-laki" required>
                                <div class="radio-radio"><!-- virtual element --></div>
                                    Laki - Laki
                            </label>

                            <label for="p">
                                <input type="radio" name="jenis_kelamin" id="p" value="perempuan">
                                <div class="radio-radio"><!-- virtual element --></div>
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="input-area">
                        <label for="agama">Agama</label>
                        <input type="text" name="agama" id="agama" required>
                    </div>

                    <div class="input-area full">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" required>
                    </div>

                    <div class="input-area btn-area">
                        <div class="btn">
                            <button type="reset">Batal</button>
                            <button type="submit" name="simpan_form" value="simpan_form">Simpan</button>
                        </div>
                    </div>
                </form>

            <?php } ?>

    </div>
</section>

<section class="right">
    <div class="content2">
    
        <?php
            // cek data pendaftar apakah ada atau belum
            $check_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar WHERE id_user = '$id_user' AND nama IS NOT NULL");

            if (mysqli_fetch_array($check_pendaftar)) {
                
                // cek foto apakah ada atau belum
                $check_foto = mysqli_query($conn, "SELECT * FROM pendaftar WHERE id_user = '$id_user' AND foto != ''");

                    if (mysqli_fetch_array($check_foto)) { ?>

                        <!-- jika foto ditemukan -->
                        <div class="blank">
                            <i class="material-icons-sharp">lock</i>
                            <p>Gambar telah tersimpan dan tidak dapat diubah</p>
                        </div>

                <?php } else {?>

                    <!-- jika foto tidak ditemukan tampilkan form gambar-->
                    <form method="POST" action="?page=form" enctype="multipart/form-data">
                        <div class="image-preview">
                            <img src="" alt="Image Preview">
                            <span>Image Preview</span>
                        </div>

                        <div class="input-area">
                            <input type="file" name="gambar" id="real-file" hidden="hidden">
                            <button type="button" id="custom-button">Pilih file</button>
                            <span id="custom-text">Tidak ada file yang dipilih.</span>
                        </div>

                        <div class="btn-area">
                            <p id="reset-preview">Hapus</p>
                            <button type="submit" name="simpan_foto" value="simpan_foto">Simpan</button>
                        </div>
                    </form>

                <?php } ?>
                
            <?php } else { ?>

                <!-- jika data pendaftar tidak ditemukan -->
                <div class="blank">
                    <i class="material-icons-sharp">lock</i>
                    <p>Masukkan data diri terlebih dahulu</p>
                </div>

            <?php } ?>

    </div>
</section>

<script src="../../assets/js/dash-siswa/form.js"></script>