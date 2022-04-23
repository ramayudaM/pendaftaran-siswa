<section class="left">
    <div class="top">
        <h2>Home</h2>
        <div class="date">
            <p><?php 
                $date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                echo $date->format("d / m / Y");?></p>
        </div>
    </div>

    <div class="content1">
        <marquee>Selamat datang <?= $_SESSION['email']; ?>, silahkan lengkapi data diri dan tunggu hasil penilaian.</marquee>
    </div>

    <div class="content2">
        <h3>Berita</h3>
        <div class="tabs">
            <h5>Data diri</h5>
            <h5>Penilaian Akhir</h5>
            <h5>Buat Akun</h5>
        </div>

        <div class="box">
            <div class="text">
                <h5>Batas pengisian data diri</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae illum doloremque eaque suscipit consectetur. Quidem quasi quibusdam consectetur vel non!</p>
            </div>
            <div class="text">
                <h5>Pembukaan penilaian akhir</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae illum doloremque eaque suscipit consectetur. Quidem quasi quibusdam consectetur vel non!</p>
            </div>
            <div class="text">
                <h5>Batas pembuatan akun</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae illum doloremque eaque suscipit consectetur. Quidem quasi quibusdam consectetur vel non!</p>
            </div>
        </div>
    </div>
</section>

<section class="right">
    <div class="content3">
        <h3>Persyaratan daftar ulang</h3>
        <div class="box">
            <p>Siswa yang lolos seleksi wajib melakukan daftar ulang dengan membawa berkas sebagai berikut:</p>
            <div class="list">
                <p>FC Akta <mark>1 lembar</mark></p> 
                <p>FC Kartu Keluarga <mark>1 lembar</mark></p>
                <p>FC Nilai Ujian Nasional <mark>2 lembar</mark></p>
                <p>FC Nilai Ujian Sekolah <mark>2 lembar</mark></p>
            </div>
        </div>
    </div>

    <div class="content4">
        <h3>Kontak dan Alamat</h3>
        <div class="list">
            <div class="kontak">
                <a href="mailto:ppdb_online_bdl@yahoo.com">
                    <i class="material-icons-sharp">email</i>
                    <p>ppdb_online_bdl@yahoo.com</p>
                </a>
                <a href="tel:+62895778666">
                    <i class="material-icons-sharp">phone</i>
                    <p>+62-895-778-666</p>
                </a>
            </div>
            <div class="lokasi">
                <a target="blank" href="https://www.google.com/maps/place/SMK+Negeri+4+Bandar+Lampung/@-5.4284526,105.269162,15z/data=!4m5!3m4!1s0x0:0xa73c4cf727653996!8m2!3d-5.4234647!4d105.2620162?hl=id">
                    <i class="material-icons-sharp">location_on</i>
                    <p>Jl. Hos Cokroaminoto No.102, Enggal, Engal, Kota Bandar Lampung, Lampung 35118</p>
                </a>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.957261677376!2d105.25982751469743!3d-5.4234646960665565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40db188a082ed5%3A0xa73c4cf727653996!2sSMK%20Negeri%204%20Bandar%20Lampung!5e0!3m2!1sid!2sid!4v1649530230419!5m2!1sid!2sid"></iframe>
            </div>
        </div>
    </div>
</section>

<script src="../../assets/js/dash-siswa/home.js"></script>