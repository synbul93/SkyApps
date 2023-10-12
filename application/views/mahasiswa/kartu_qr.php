<!DOCTYPE html>
<html>

<head>
    <title>Kartu Mahasiswa</title>
    <link rel="icon" href="<?= base_url('assets/img/bsky.png'); ?>" type="image/gif" sizes="16x16">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }

        .card {
            width: 600px;
            height: 840px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            margin: 0 auto;
            margin-top: 10px;
        }

        .card .header img {
            width: 74px;
            margin-left: 10px;
            margin-top: 1px;
        }

        .card .header h1 {
            font-size: 15px;
            font-weight: 600;
            margin-top: 15px;
            margin-bottom: 10px;
        }

        .card .header td {
            margin-bottom: 0;
        }

        .card .header p {
            font-size: 12px;
        }

        .header-text h3 {
            font-size: 20px;
            margin-bottom: 20px;
            margin-top: 20px;
            text-transform: uppercase;
            font-weight: 600;
            text-align: center;
        }

        .text-btm {
            font-size: 12px;
            margin-top: 28px;
            font-weight: 600;
            font-style: normal;
            text-align: center;
        }

        .text-hdr {
            font-size: 14px;
            margin-top: 19px;
            font-weight: 600;
            margin-left: 68px;
            font-style: normal;
        }

        .footer {
            margin-top: 20px;
        }

        .footer .ketua {
            text-align: right;

        }

        .footer .ketua img {
            width: 160px;
            margin-right: 0px;
        }

        .footer .ketua h1 {
            font-size: 13px;
        }

        .footer .ketua p {
            font-size: 13px;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="card">
        <table class="header">
            <tr>
                <td>
                    <img src="<?= base_url('assets/img/bsky.png') ?>" alt="">
                </td>
                <td width="100%" align="center" border="0">
                    <h1>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br>UNIVERSITAS BSKY <br>DIGITAL LIBRARY UNIVERSITAS BSKY</h1>
                    <p>Jl. Raya Cimindi No 212 A <br> Kelurahan Sukaraja, Kecamatan Cicendo, Jawa Barat, Indonesia, 40175 <br>Website: bsky.co.id | Telp. (022) 12345678</p>
                </td>
            </tr>
        </table>
        <hr size="10px" width="50%" align="left">
        <div class="header-text">
            <h3>Data Mahasiswa Universitas bsky</h3>
        </div>

        <div class="text-hdr">
            <p>Direktur Akademik Universitas Bsky, Menerangkan Bahwa :</p>
        </div>

        <table style="font-size:14px;color:#000;margin-left:70px;margin-top:1px;">
            <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td><?= $mahasiswa['nama']; ?></td>
            </tr>
            <tr>
                <td>Nomor Induk</td>
                <td>:</td>
                <td>
                    <?= $mahasiswa['nrp']; ?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?= $mahasiswa['email']; ?></td>
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
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><?= $mahasiswa['alamat']; ?></td>
            </tr>
        </table>

        <div class=" text-btm">
            <p>Aktif sebagai Mahasiswa Universitas Bsky, pada semester Ganjil tahun akademik 2023-2027. <br>Data anggota ini diterbitkan melalui Sistem Sky Apps atas data dari anggota Universitas Bsky. Kebenarana dan keabsahan atas data yang ditampilkan dalam dokumen ini dan data yang tersimpan dalam sistem Sky Apps menjadi tanggung jawab Anggota Universitas sepenuhnya.</p>
        </div>

        <div class="footer">
            <div class="ketua">
                <h1>
                    Bandung, <?= date('d F Y'); ?> <br> An. Direktur Akademik
                </h1>
                <img src="<?= base_url('assets/img/cap-ttd.png') ?>" alt="">
                <p>Prof. Bay Subaryat S.kom .Phd <br>NIP: 0292327929732737</p>
            </div>
        </div>
    </div>
    </div>