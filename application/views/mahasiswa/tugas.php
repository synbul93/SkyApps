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
                    <a href="<?= base_url(); ?>repository/tambah" class="btn btn-primary">Tambah</a>
                </div>

                <div class="row mt-3">
                    <div class="col-md">
                        <div class="table-responsive">
                            <div class="card">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Nomor Induk</th>
                                            <th>Dosen</th>
                                            <th></th>
                                            <th>Action</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>