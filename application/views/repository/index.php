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
                    <a href="<?= base_url(); ?>repository/tambah" class="btn btn-primary">Tambah Data Repository</a>
                    <a href="<?= base_url(''); ?>repository/exportPDF" class="btn btn-danger">Export PDF</a>
                    <a href="<?= base_url(''); ?>repository/exportExcel" class="btn btn-success">Export Excel</a>
                </div>

                <div class="row mt-3">
                    <div class="col-md">
                        <div class="table-responsive">
                            <div class="card">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nomor Induk</th>
                                            <th>Dosen</th>
                                            <th></th>
                                            <th>Action</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1;
                                        foreach ($repository as $rps) : ?>
                                            <tr>
                                                <td><?= ++$start ?></td>
                                                <td><?php echo $rps['nama'] ?></td>
                                                <td><?php echo $rps['nrp'] ?></td>
                                                <td><?php echo $rps['dosen'] ?></td>
                                                <td><a href="<?= base_url(); ?>repository/detail/<?= $rps['id']; ?>" class="badge badge-primary">Detail</a></td>
                                                <td><a href="<?= base_url(); ?>repository/hapus/<?= $rps['id']; ?>" data-toggle="modal" data-target="#deleteModal" class="badge badge-danger">Delete</a> </td>
                                                <td><a href=" <?= base_url(); ?>repository/ubah/<?= $rps['id']; ?>" class="badge badge-success">Edit</a></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                                <?php echo $this->pagination->create_links(); ?>
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
                                <a class="btn btn-danger" href="<?= base_url(); ?>repository/hapus/<?= $rps['id']; ?>">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.container-fluid -->
</div>
</div>

<!-- End of Main Content -->