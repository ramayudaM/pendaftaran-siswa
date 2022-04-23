<?php include('../../controller/system/sys-profile.php'); ?>

<?php if (isset($_SESSION['form_success'])) { ?>

    <div class='alert success shake'>
        <div class='text'>
            <i class='material-icons-sharp'>check_circle</i>
            <p><?= $_SESSION['form_success']?></p>
        </div>
        <span class='material-icons-sharp'>close</span>
    </div>

<?php } unset($_SESSION['form_success']); ?>

<section class="left">
    <div class="top">
        <h2>Profile</h2>
        <div class="date">
            <p><?php 
                $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                echo $date->format("d / m / Y");?></p>
        </div>
    </div>

    <div class="content1">
        <div class="foto">
            <?php
                if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                    $foto = '../../uploads/' . $data_pendaftar['foto'];
                  } else {
                    $foto = '../../assets/image/avatar.jpg';
                  }
            ?>

            <img src="<?= $foto ?>" alt="profil">
            <div class="text">
                <h5><?= $_SESSION['email'] ?></h5>
                <p><?= $_SESSION['level'] ?></p>
            </div>
        </div>
        <div class="data">
            <div class="list">
                <h5>Nama Lengkap</h5>
                <p><?= $data_pendaftar['nama'] ?></p>
            </div>
            <div class="list">
                <h5>NISN</h5>
                <p><?= $data_pendaftar['nisn'] ?></p>
            </div>
            <div class="list">
                <h5>Tempat Lahir</h5>
                <p><?= $data_pendaftar['tempat_lahir'] ?></p>
            </div>
            <div class="list">
                <h5>Tanggal Lahir</h5>
                <p><?= date("d-m-Y", strtotime($data_pendaftar['tanggal_lahir'])) ?></p>
            </div>
            <div class="list">
                <h5>Jenis Kelamin</h5>
                <?php 
                    if ($data_pendaftar['jenis_kelamin'] == 'laki-laki') {
                        $kelamin = "Laki - Laki";
                    } else {
                        $kelamin = "Perempuan";
                    }
                ?>
                <p><?= $kelamin ?></p>
            </div>
            <div class="list">
                <h5>Agama</h5>
                <p><?= $data_pendaftar['agama'] ?></p>
            </div>
            <div class="list">
                <h5>Alamat</h5>
                <p><?= $data_pendaftar['alamat'] ?></p>
            </div>
        </div>
    </div>
</section>

<section class="right">

    <?php if (!isset($status)) { ?>

        <div class="content2">
            <!-- jika nilai belum di isi -->
            <div class="box">
                <form method="POST" action="?page=profile">
                    <div class="input-area">
                        <label for="us">Nilai US</label>
                        <input type="number" name="nilai_us" id="us" required>
                    </div>

                    <div class="input-area">
                        <label for="un">Nilai UN</label>
                        <input type="number" name="nilai_un" id="un" required>
                    </div>

                    <div class="input-area btn-area">
                        <div class="btn">
                            <button type="reset">Batal</button>
                            <button type="submit" name="simpan_nilai" value="simpan_nilai">Kirim</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    <?php } else if (isset($status) && $status == 0 ) {?>
        
        <div class="content2">
            <!-- proses penilaian -->
            <h3>Pengumunan hasil seleksi</h3>
            <div class="box pengumuman satu">
                <h4>Proses Penilaian :</h4>
                <i class="material-icons-sharp">cached</i>
                <p>Terima kasih telah melakukan pendaftaran online. Pengumuman pada tanggal:</p>
                <mark>20 April 2022</mark>
            </div>
        </div>

        <div class="content3">
            <div class="data">
                <div class="list">
                    <h5>Nilai Ujian Sekolah</h5>
                    <p><?= $data_nilai['nilai_us'] ?></p>
                </div>
                <div class="list">
                    <h5>Nilai Ujian Nasional</h5>
                    <p><?= $data_nilai['nilai_un'] ?></p>
                </div>
            </div>
        </div>

    <?php } else if (isset($status) && $status == 1 ) {?>
        
        <div class="content2">
            <!-- lolos -->
            <h3>Pengumunan hasil seleksi</h3>
            <div class="box pengumuman dua">
                <h4>Anda Lolos :</h4>
                <i class="material-icons-sharp">check_circle</i>
                <p>Selamat anda lolos seleksi pendaftaran online. Lakukan Daftar Ulang pada tanggal:</p>
                <mark>26 April 2022</mark>
            </div>
        </div>

        <div class="content3">
            <div class="data">
                <div class="list">
                    <h5>Nilai Ujian Sekolah</h5>
                    <p><?= $data_nilai['nilai_us'] ?></p>
                </div>
                <div class="list">
                    <h5>Nilai Ujian Nasional</h5>
                    <p><?= $data_nilai['nilai_un'] ?></p>
                </div>
            </div>
        </div>
        
    <?php } else if (isset($status) && $status == 2 ) {?>
        
        <div class="content2">
            <!-- tidak lolos -->
            <h3>Pengumunan hasil seleksi</h3>
            <div class="box pengumuman tiga">
                <h4>Anda Tidak Lolos :</h4>
                <i class="material-icons-sharp">cancel</i>
                <p>Anda Belum lolos. Terima kasih telah mengikuti seleksi dengan baik.</p>
            </div>
        </div>

        <div class="content3">
            <div class="data">
                <div class="list">
                    <h5>Nilai Ujian Sekolah</h5>
                    <p><?= $data_nilai['nilai_us'] ?></p>
                </div>
                <div class="list">
                    <h5>Nilai Ujian Nasional</h5>
                    <p><?= $data_nilai['nilai_un'] ?></p>
                </div>
            </div>
        </div>
        
    <?php } ?>

</section>