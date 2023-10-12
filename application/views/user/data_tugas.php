<!-- daftar_tugas_mahasiswa.php -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Tugas Mahasiswa</h1>

    <div class="row">
        <div class="col-lg">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Judul Tugas</th>
                                <th>Status</th>
                                <th>Nilai</th>
                                <th>Catatan Penolakan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($daftar_tugas as $tugas) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $tugas['nama'] ?></td>
                                    <td><?= $tugas['judul'] ?></td>
                                    <td>
                                        <?php if ($tugas['status'] == 0) : ?>
                                            <span class="badge badge-warning">Pending</span>
                                        <?php elseif ($tugas['status'] == 1) : ?>
                                            <span class="badge badge-success">Disetujui</span>

                                        <?php elseif ($tugas['status'] == 2) : ?>
                                            <span class="badge badge-danger">Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <p><?php if ($tugas['status'] == 1 && !empty($tugas['nilai'])) : ?>
                                                <?= $tugas['nilai'] ?>
                                            <?php else : ?>
                                                <?= '-' ?>
                                            <?php endif; ?>
                                        </p>
                                    </td>
                                    </td>
                                    <td><?php if ($tugas['status'] == 2 && !empty($tugas['catatan_penolakan'])) : ?>
                                            <?= $tugas['catatan_penolakan'] ?>
                                        <?php else : ?>
                                            <?= '-' ?>
                                        <?php endif; ?></td>
                                    <td>
                                        <a href="<?= base_url('user/detail_tugas/' . $tugas['id']) ?>" class="badge badge-primary">Detail Tugas</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (empty($tugas)) : ?>
                        <div class="alert alert-warning text-center" role="alert">
                            Belum ada mahasiswa yang mengumpulkan tugas atau kamu belum memberikan tugas!
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>