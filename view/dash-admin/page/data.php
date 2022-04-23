<?php
    include('../../controller/system/sys-data.php');
?>

<?php
    if (isset($_SESSION['hapus_success'])) { ?>

    <div class="alert success">
        <div class="text">
            <i class="material-icons-sharp">check_circle</i>
            <p><?= $_SESSION['hapus_success']; ?></p>
        </div>
        <span class="material-icons-sharp">close</span>
    </div>

<?php } unset($_SESSION['hapus_success']);?>

<section class="left">
    <div class="top">
        <h2>Data Pendaftar</h2>
        <div class="date">
            <p><?php 
                $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                echo $date->format("d / m / Y");?></p>
        </div>
    </div>

    <div class="content1">
        <table>
            <thead>
                <th>No</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Alamat</th>
                <th>Nilai UN</th>
                <th>Nilai US</th>
                <th>Rata" Nilai</th>
                <th>Status</th>
                <th>Action</th>
            </thead>
            <tbody>

                <?php
                    $no = 1;
                    while($pendaftar = mysqli_fetch_array($all_pendaftar)) { ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pendaftar['nama']; ?></td>
                            <td><?= $pendaftar['nisn']; ?></td>
                            <td><?= $pendaftar['alamat']; ?></td>
                            <td><?= $pendaftar['nilai_un']; ?></td>
                            <td><?= $pendaftar['nilai_us']; ?></td>
                            <td>
                                <!-- number_format (value 0.00) -->
                                <?= number_format(($pendaftar['nilai_un'] + $pendaftar['nilai_us']) / 2, 2)  ?>
                            </td>

                            <!-- cek status pendaftar -->
                            <td>
                                <?php
                                    if ($pendaftar['status'] == 0) {?>
                                        <span class="btn-status info" data-modal="modal<?= $pendaftar['id_pendaftar']?>">Baru</span>
                                <?php  } else if ($pendaftar['status'] == 1) { ?>
                                        <span class="btn-status success" data-modal="modal<?= $pendaftar['id_pendaftar']?>">Lolos</span>
                                <?php } else if ($pendaftar['status'] == 2) { ?>
                                        <span class="btn-status error" data-modal="modal<?= $pendaftar['id_pendaftar']?>">Tidak Lolos</span>
                                <?php } ?>
                            
                            </td>
                            <td><i class="material-icons-sharp info btn-cek" cek-modal="modal-cek<?= $pendaftar['id_pendaftar']?>">zoom_in</i>
                                <i class="material-icons-sharp error btn-hapus" hapus-modal="modal-hapus<?= $pendaftar['id_pendaftar']?>">delete</i></td>
                        </tr>
                        
                        <!-- modal mengubah status pendaftar -->
                        <div class="status" id="modal<?= $pendaftar['id_pendaftar']?>">
                            <form method="POST" action="?page=data">
                                <div class="form">
                                    <div class="text">
                                        <h3>Penilaian data pendaftar</h3>
                                        <div class="option">
                                            <p>Beri penilaian:</p>

                                            <!-- virtual element id -->
                                            <input type="text" name="id_pendaftar" value="<?= $pendaftar['id_pendaftar']?>" hidden="hidden">

                                            <div class="input-wrap">

                                                <!-- cek status checked radio-->
                                                <?php
                                                    $lolos = "";
                                                    $tolak = "";

                                                    if ($pendaftar['status'] == '1') {
                                                        $lolos = "checked";
                                                    } else if ($pendaftar['status'] == 2){
                                                        $tolak = "checked";
                                                    }

                                                ?>

                                                <label>    
                                                    <input type="radio" name="status" value="1" <?= $lolos ?>>
                                                    <div class="radio-radio"><!-- virtual element --></div>
                                                        Lolos
                                                </label>

                                                <label>
                                                    <input type="radio" name="status" value="2" <?= $tolak ?>>
                                                    <div class="radio-radio"><!-- virtual element --></div>
                                                        Tidak Lolos
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="button">
                                        <button id="batal-status">Batal</button>
                                        <button type="submit" name="simpan_status" value="simpan_status">Kirim</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!-- modal menghapus pendaftar -->
                        <div class="hapus" id="modal-hapus<?= $pendaftar['id_pendaftar']?>">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3>Apakah Anda yakin?</h3>
                                </div>

                                <div class="modal-body">
                                    <p>Anda akan menghapus data pendaftar atas nama <?= $pendaftar['nama'];?></p>
                                    <h4>Data akan dihapus permanen.</h4>
                                </div>

                                <div class="modal-footer">
                                    <button id="batal-hapus">Batal</button>
                                    <a href="../../controller/system/sys-hapus.php?action=hapus&id=<?= $pendaftar['id_pendaftar']?>">Hapus</a>
                                </div>
                            </div>
                        </div>

                        <!-- modal cek data pendaftar -->
                        <div class="cek-data" id="modal-cek<?= $pendaftar['id_pendaftar']?>">
                            <div class="modal-content">
                                <div class="modal-left">
                                    <div class="modal-header">
                                        <?php
                                            if(isset($pendaftar['foto']) && $pendaftar['foto'] != '') {
                                                $foto = '../../uploads/' . $pendaftar['foto'];
                                            } else {
                                                $foto = '../../assets/image/avatar.jpg';
                                            }
                                        ?>
                                        <img src="<?= $foto ?>" alt="profil">
                                        <div class="text">
                                            <h5><?= $pendaftar['email']?></h5>
                                            <p><?= $pendaftar['level']?></p>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <div class="data">
                                            <div class="list">
                                                <h5>Nama Lengkap</h5>
                                                <p><?= $pendaftar['nama'] ?></p>
                                            </div>
                                            <div class="list">
                                                <h5>NISN</h5>
                                                <p><?= $pendaftar['nisn'] ?></p>
                                            </div>
                                            <div class="list">
                                                <h5>Tempat Lahir</h5>
                                                <p><?= $pendaftar['tempat_lahir'] ?></p>
                                            </div>
                                            <div class="list">
                                                <h5>Tanggal Lahir</h5>
                                                <p><?= date("d-m-Y", strtotime($pendaftar['tanggal_lahir'])) ?></p>
                                            </div>
                                            <div class="list">
                                                <h5>Jenis Kelamin</h5>
                                                <?php 
                                                    if ($pendaftar['jenis_kelamin'] == 'laki-laki') {
                                                        $kelamin = "Laki - Laki";
                                                    } else {
                                                        $kelamin = "Perempuan";
                                                    }
                                                ?>
                                                <p><?= $kelamin ?></p>
                                            </div>
                                            <div class="list">
                                                <h5>Agama</h5>
                                                <p><?= $pendaftar['agama'] ?></p>
                                            </div>
                                            <div class="list">
                                                <h5>Alamat</h5>
                                                <p><?= $pendaftar['alamat'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="modal-right">
                                    <div class="modal-header">
                                        <?php
                                            $status = $pendaftar['status'];

                                            if ($pendaftar['status'] == 0) { ?>
                                                <div class="modal-toggle info">
                                                    <h3>Data pendaftar belum di validasi</h3>
                                                </div>
                                        <?php } else if ($pendaftar['status'] == 1) { ?>
                                                <div class="modal-toggle success">
                                                    <h3>Data pendaftar dinyatakan lolos</h3>
                                                </div>
                                        <?php } else if ($pendaftar['status'] == 2) { ?>
                                                <div class="modal-toggle error">
                                                    <h3>Data pendaftar dinyatakan tidak lolos</h3>
                                                </div>
                                        <?php } ?>
                                    </div>
                                    <div class="modal-body">
                                        <div class="data">
                                            <div class="list">
                                                <h5>Nilai Ujian Nasional</h5>
                                                <p><?= $pendaftar['nilai_un'] ?></p>
                                            </div>
                                            <div class="list">
                                                <h5>Nilai Ujian Sekolah</h5>
                                                <p><?= $pendaftar['nilai_us'] ?></p>
                                            </div>
                                            <div class="list">
                                                <h5>Rata-Rata Nilai</h5>
                                                <p><?= number_format(($pendaftar['nilai_un'] + $pendaftar['nilai_us']) / 2, 2) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="batal-data" id="batal-cek">
                                            <i class="material-icons-sharp">arrow_back</i>
                                            <p>Back</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php } ?>

            </tbody>
        </table>
    </div>
</section>