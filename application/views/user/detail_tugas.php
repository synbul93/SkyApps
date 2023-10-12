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
                                            <td class="col-lg-4">Nama</td>
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
                                            <td>Dosen Tujuan</td>
                                            <td>:</td>
                                            <td><?= $user['name']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Upload</td>
                                            <td>:</td>
                                            <td>
                                                <?= $tugas['tanggal_upload'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Unduh File</td>
                                            <td>:</td>
                                            <td><a href="<?= base_url('assets/file/tugas/' . $tugas['file']); ?>" class="badge badge-danger"> <?= $tugas['file']; ?></a></td>
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
                <div class="card">
                    <h5 class="card-header text-center">Action</h5>
                    <div class="card-body">
                        <div class="row">
                            <?php if ($tugas['status'] == 0) : ?>
                                <div class="col-lg-5">
                                    <form action="<?= base_url('user/approve/' . $tugas['id'] . '/reject') ?>" method="post">
                                        <div class="form-group">
                                            <label for="catatan_penolakan">Catatan Penolakan</label>
                                            <textarea class="form-control" name="catatan_penolakan" id="catatan_penolakan" required></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-danger">Tolak Tugas</button>
                                    </form>
                                </div>
                            <?php endif; ?>

                            <?php if ($tugas['status'] == 0) : ?>
                                <div class="col-lg-2">
                                    <form action="<?= base_url('user/approve/' . $tugas['id'] . '/approve') ?>" method="post">
                                        <div class="form-group">
                                            <label for="nilai">Nilai</label>
                                            <input type="text" class="form-control" name="nilai" id="nilai" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Nilai Tugas</button>
                                    </form>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>