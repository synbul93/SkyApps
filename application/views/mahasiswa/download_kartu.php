<!DOCTYPE html>
<html>

<head>
    <title>Kartu Mahasiswa</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        .kartu {
            width: 320px;
            height: 480px;
            padding: 20px;
            position: relative;
            border: 1px solid #ccc;
            background-image: linear-gradient(50deg, blue, white, aqua);
            border-radius: 10px;
            margin: 0 auto;
            overflow: hidden;
            z-index: 1;
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
            height: 480px;
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

        .map-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            opacity: 0.3;
            z-index: -1;
        }

        .text-btm {
            font-size: 12px;
            color: #000;
            margin-top: 10px;
            font-weight: 600;
            font-style: normal;
            text-align: center;
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
</head>

<body>

    <div class="kartu">
        <div class=" front">
        </div>
        <div class="image-header">
            <img src="<?= base_url('assets/img/bsky.png') ?>" alt="" style="width: 60px;margin-left: 125px;
            margin-top: 1px;">
        </div>

        <div class="header-text">
            <h3>Kartu Tanda Mahasiswa</h3>
        </div>
        <table style="font-size:13px;color:#000;margin-left:35px;margin-top:1px;">
            <tr>
                <td width="66px">Nama</td>
                <td width="3px;">:</td>
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
            <p>Kartu ini dapat digunakan untuk kepentingan mahasiswa saat memasuki perpustakaan, selama kartu ini masih berlaku.</p>

        </div>

        <div class="qr-code">
            <p>Berlaku Sampai <br><?= date('d F Y'); ?> - <?= date('d F 2027'); ?></p>
            <img src="<?= $qrCode; ?>" alt="QR Code" style=" width: 80px;
            margin-top: -10px;">
        </div>
    </div>
    <div class="kartu-belakang">
        <div class="image-belakang">
            <img src="<?= base_url('assets/img/bsky.png') ?>" alt="" style=" width: 100px;
            margin-left: 110px;
            margin-top: 120px;">
        </div>

        <div class="header-text">
            <h3>Universitas Bsky</h3>
        </div>
    </div>
    </div>
    </div>
    </div>

</body>

</html>