<!-- daftar_tugas_mahasiswa.php -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Daftar Tugas</h1>

    <div class="row">
        <div class="col-lg">
            <?= $this->session->flashdata('message'); ?>
            <div class="table-responsive">
                <div class="card">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dosen</th>
                                <th>Fakultas</th>
                                <th>Judul Tugas</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($daftar_tugas_dosen as $tugas) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $tugas['nama'] ?></td>
                                    <td><?= $tugas['fakultas'] ?></td>
                                    <td><?= $tugas['judul'] ?></td>
                                    <td>
                                        <a href="<?= base_url('user/detail_tugas_dosen/' . $tugas['id']) ?>" class="badge badge-primary">Detail Tugas</a><br>
                                        <a href="<?= base_url('user/edit_tugas_dosen/' . $tugas['id']) ?>" class="badge badge-success">Edit Tugas</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if (empty($tugas)) : ?>
                        <div class="alert alert-warning text-center" role="alert">
                            Kamu belum memberikan tugas kepada mahasiswa!
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>