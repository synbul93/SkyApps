<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg">
                <div class="col-md-6">
                    <?= $this->session->flashdata('message'); ?>
                    <a href="<?= base_url(); ?>user_mahasiswa/tambah" class="btn btn-primary">Tambah Data Repository</a>
                </div>

                <div class="row mt-3">
                    <div class="col-md">
                        <div class="table-responsive">
                            <div class="card">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Judul</th>
                                            <th>Jenis Koleksi</th>
                                            <th>Penerbit</th>
                                            <th></th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($repository as $repo) : ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $repo['judul'] ?></td>
                                                <td><?= $repo['koleksi'] ?></td>
                                                <td><?= $repo['penerbit'] ?></td>
                                                <td><a href="<?= base_url(); ?>user_mahasiswa/detail/<?= $repo['id']; ?>" class="badge badge-primary">Detail</a></td>
                                                <td><a href="" data-toggle="modal" data-target="#deleteModal" class="badge badge-danger">Delete</a> </td>
                                                <td><a href="<?= base_url(); ?>user_mahasiswa/edit/<?= $repo['id']; ?>" class="badge badge-success">Edit</a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php if (empty($repository)) : ?>
                                    <div class="alert alert-warning text-center" role="alert">
                                        Kamu belum mengisi data repository!
                                    </div>
                                <?php endif; ?>
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
                                <a class="btn btn-danger" href="<?= base_url(); ?>user_mahasiswa/hapus/<?= $repo['id']; ?>">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
    </div>
</div>