<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg">
            <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
            </div>
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Nomor Induk</th>
                                <th scope="col">Email</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Position</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($users as $us) : ?>
                                <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?= $us['name']; ?></td>
                                    <td><?= $us['nomor_induk']; ?></td>
                                    <td><?= $us['email']; ?></td>
                                    <td><?= $us['jurusan']; ?></td>
                                    <td> <?php if ($us['role_id'] == 1) : ?>
                                            <span>Admin</span>
                                        <?php elseif ($us['role_id'] == 2) : ?>
                                            <span>Dosen</span>
                                        <?php elseif ($us['role_id'] == 3) : ?>
                                            <span>Mahasiswa</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($us['is_approved'] == 1) : ?>
                                            <span class="badge badge-success">Approved</span>
                                        <?php elseif ($us['is_approved'] == 0) : ?>
                                            <span class="badge badge-warning">Pending</span>
                                        <?php elseif ($us['is_approved'] == 2) : ?>
                                            <span class="badge badge-danger">Rejected</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if ($us['is_approved'] == 0) : ?>
                                            <a href="" data-toggle="modal" data-target="#approveModal" class="badge badge-success">Approve</a>
                                            <a href="<?= base_url('admin/reject/' . $us['id']); ?>" class="badge badge-danger">Reject</a>
                                        <?php else : ?>
                                            <a href="" data-toggle="modal" data-target="#approveModal" class="badge badge-success">Approve</a>
                                            <a href="<?= base_url('admin/reject/' . $us['id']); ?>" class="badge badge-warning">Reject</a>
                                            <a href="" class=" badge rounded-pill badge-danger" data-toggle="modal" data-target="#deleteModal" class="badge badge-danger">Delete</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>
    </div>
</div>
<!-- approve modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure to approve it?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"> If you are sure, press the "Approve" button<br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-success" href="<?= base_url(); ?>admin/approve/<?= $us['id']; ?>">Approve</a>
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
            <div class="modal-body">If you are sure, press the "Delete" button<br>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= base_url(); ?>admin/deleteuser/<?= $us['id']; ?>">Delete</a>
            </div>
        </div>
    </div>
</div>

<!-- End of Main Content -->


<!-- End of Main Content -->