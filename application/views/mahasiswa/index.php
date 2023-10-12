<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->

    <!-- Page Heading -->

    <div class="row">

        <div class="col-lg">

            <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url(); ?>mahasiswa/tambah" class="btn btn-primary">Tambah Data Mahasiswa</a>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <form action="" method="post">

                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search Student Data.." name="keyword">
                            <div class="input-group-append ">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md">
                    <?php if (empty($mahasiswa)) : ?>
                        <div class="alert alert-danger" role="alert">
                            Data tidak ditemukan.
                        </div>
                    <?php endif; ?>
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nomor Induk</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                        <th scope="col">Action</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mahasiswa as $mhs) : ?>
                                        <tr>
                                            <td><?= ++$start ?></td>
                                            <td><?php echo $mhs['nama'] ?></td>
                                            <td><?php echo $mhs['nrp'] ?></td>
                                            <td><?php echo $mhs['email'] ?></td>
                                            <td><a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>" class="badge badge-primary">Detail</a></td>
                                            <td><a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>" data-toggle="modal" data-target="#deleteModal" class="badge badge-danger">Delete</a> </td>
                                            <td> <a href=" <?= base_url(); ?>mahasiswa/ubah/<?= $mhs['id']; ?>" class="badge badge-success">Edit</a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
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
                        <a class="btn btn-danger" href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End of Main Content -->