<style>
    .kartu {
        width: 320px;
        height: 500px;
        padding: 20px;
        position: relative;
        border: 1px solid #ccc;
        background-image: linear-gradient(50deg, blue, white, aqua);
        border-radius: 10px;
        margin: 0 auto;
        overflow: hidden;
        z-index: 2;
        backface-visibility: hidden;
        margin-top: 10px;
    }

    .kartu .image-header img {
        width: 50px;
        margin-left: 115px;
        margin-top: 1px;
    }

    .kartu-belakang {
        width: 320px;
        height: 500px;
        padding: 20px;
        border: 1px solid #ccc;
        background-image: linear-gradient(50deg, blue, white, aqua);
        border-radius: 10px;
        margin: 0 auto;
        margin-top: 10px;
    }

    .kartu-belakang .image-belakang img {
        width: 100px;
        margin-left: 90px;
        margin-top: 120px;
    }

    .qr-code {
        text-align: center;
        margin-top: -14px;
    }

    .header-text h3 {
        font-size: 20px;
        margin-bottom: 20px;
        color: #000;
        margin-top: 20px;
        text-transform: uppercase;
        font-weight: 600;
        text-align: center;
    }

    .text-btm {
        font-size: 12px;
        color: #000;
        margin-top: 10px;
        font-weight: 600;
        font-style: normal;
        text-align: center;
    }

    .map-img {
        width: 100%;
        position: absolute;
        margin-top: 150px;
        top: 0;
        left: 0;
        opacity: 0.3;
        z-index: -1;
    }

    .qr-code img {
        width: 80px;
        margin-top: -10px;
    }

    .qr-code p {
        font-size: 11px;
        color: #000;
        margin-top: 25px;
    }
</style>
<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- Page Heading -->

    <div class="row">

        <div class="kartu">
            <div class=" front">
                <img src="<?= base_url('assets/img/map.png') ?>" class="map-img">
            </div>
            <div class="image-header">
                <img src="<?= base_url('assets/img/bsky.png') ?>" alt="">
            </div>

            <div class="header-text">
                <h3>Kartu Mahasiswa</h3>
            </div>
            <table style="font-size:13px; font-weight: 600;color:#000;margin-left:30px;margin-top:1px;">
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= $mahasiswa['nama']; ?></td>
                </tr>
                <tr>
                    <td>Nomor Induk</td>
                    <td>:</td>
                    <td><?= $mahasiswa['nrp']; ?></td>
                </tr>
                <tr>
                    <td valign="top">Email</td>
                    <td valign="top">:</td>
                    <td><?= $mahasiswa['email']; ?> </td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?= $mahasiswa['alamat']; ?></td>
                </tr>
                <tr>
                    <td>Fakultas</td>
                    <td>:</td>
                    <td><?= $mahasiswa['jurusan']; ?></td>
                </tr>
                <tr>
                    <td>Program</td>
                    <td>:</td>
                    <td><?= $mahasiswa['program']; ?></td>
                </tr>
            </table>
            <div class="text-btm">
                <p>Kartu ini dapat digunakan untuk kepentingan mahasiswa selama berada di lingkungan kampus, selama kartu ini masih berlaku.</p>
            </div>

            <div class="qr-code">
                <p>Berlaku Sampai <br><?= date('d F Y'); ?> - <?= date('d F 2027'); ?></p>
                <img src="<?= $qrCode; ?>" alt="QR Code">
            </div>
        </div>
        <div class="kartu-belakang">

            <div class="image-belakang">
                <img src="<?= base_url('assets/img/bsky.png') ?>" alt="">
            </div>
            <div class="header-text">
                <h3>Universitas Bsky</h3>
            </div>
        </div>
    </div>
    <br>
    <div class="d-flex justify-content-center">
        <div class="d-grid gap-2 d-md-block">
            <a href="<?= base_url('mahasiswa/download_kartu/' . $mahasiswa['id']); ?>" class="btn btn-success">Unduh Kartu</a>
        </div>
    </div>

</div>
</div>