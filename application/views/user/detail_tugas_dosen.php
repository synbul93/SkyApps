<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg entries">
                <div class="card">
                    <div class="card-body">
                        <div class="entry col-md-12 mb-5 mb-md-5">
                            <div class="entry-meta">
                                <h3 class="text-center"><?= $tugas['judul']; ?></h3>
                                <table class="table table-sm table-hover text-black">
                                    <tbody>
                                        <tr>
                                            <td class="col-lg-4">Nama Dosen</td>
                                            <td class="col-lg-1">:</td>
                                            <td class="col-lg-7"><?= $tugas['nama']; ?></td>
                                        </tr>
                                        <tr>
                                        <tr>
                                            <td class="col-lg-4">Fakultas</td>
                                            <td class="col-lg-1">:</td>
                                            <td class="col-lg-7"><?= $tugas['fakultas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Judul</td>
                                            <td>:</td>
                                            <td><?= $tugas['judul']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>
                                                <?= $tugas['tgl_mulai'] ?> s/d <?= $tugas['tgl_akhir'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Unduh File</td>
                                            <td>:</td>
                                            <td><a href="<?= base_url('assets/file/tugas_dosen/' . $tugas['file']); ?>" class="badge badge-danger"> <?= $tugas['file']; ?></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- entry meta -->
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header text-center">Deskripsi Tugas</h5>
                    <div class="card-body">
                        <p class="card-text text-black"> <?php if (empty($tugas['deskripsi'])) : ?>
                                Data Deskripsi Tugas Tidak Tersedia.
                            <?php endif; ?>
                            <?= $tugas['deskripsi']; ?></p>
                    </div>
                </div>
                <br>
                <a href="<?= base_url('user/daftar_tugas'); ?>" class="btn btn-primary"> Kembali </a>
            </div>
        </div>
    </div>
</div>
</div>