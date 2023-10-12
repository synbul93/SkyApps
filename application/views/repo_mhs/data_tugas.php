<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md">
                    <?= $this->session->flashdata('message'); ?>
                    <div class="row mt-3">
                        <div class="col-lg">
                            <div class="table-responsive">
                                <div class="card">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Judul Tugas</th>
                                                <th scope="col">Deskripsi Tugas</th>
                                                <th scope="col">Dosen Tujuan</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Nilai</th>
                                                <th scope="col">Catatan</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            foreach ($daftar_tugas as $tugas) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $tugas['judul'] ?></td>
                                                    <td><?= $tugas['deskripsi'] ?></td>
                                                    <td><?= $tugas['dosen_tujuan'] ?></td>
                                                    <td>
                                                        <?php if ($tugas['status'] == 0) : ?>
                                                            <span class="badge badge-warning">Pending</span>
                                                        <?php elseif ($tugas['status'] == 1) : ?>
                                                            <span class="badge badge-success">Disetujui</span>
                                                        <?php elseif ($tugas['status'] == 2) : ?>
                                                            <span class="badge badge-danger">Ditolak</span>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?php if ($tugas['status'] == 1 && !empty($tugas['nilai'])) : ?>
                                                            <?= $tugas['nilai'] ?>
                                                        <?php else : ?>
                                                            <?= '-' ?>
                                                        <?php endif; ?>
                                                    </td>
                                                    <td> <?php if ($tugas['status'] == 2 && !empty($tugas['catatan_penolakan'])) : ?>
                                                            <?= $tugas['catatan_penolakan'] ?>
                                                        <?php else : ?>
                                                            <?= '-' ?>
                                                        <?php endif; ?></td>
                                                    <td> <a href="<?= base_url('user_mahasiswa/edit_tugas/' . $tugas['id']) ?>" class="badge badge-primary">Edit Tugas</a> <br> <a href="" data-toggle="modal" data-target="#deleteModal" class="badge badge-danger">Hapus Tugas</a> </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php if (empty($daftar_tugas)) : ?>
                                        <div class="alert alert-warning text-center" role="alert">
                                            Kamu belum mengisi data tugas yang telah di berikan dosen!
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
    <!-- delete modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete it?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" if you are sure.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('user_mahasiswa/hapus_tugas/' . $tugas['id']) ?>" class="btn btn-danger">Hapus Tugas</a>
                </div>
            </div>
        </div>
    </div>
</div>