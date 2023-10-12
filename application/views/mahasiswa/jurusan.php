<!-- Begin Page Content -->

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- Page Heading -->

    <div class="row">

        <div class="col-lg">

            <div class="col-md-6">
                <?= $this->session->flashdata('message'); ?>
                <a href="<?= base_url(); ?>mahasiswa/tambahDataJurusan" class="btn btn-primary">Tambah Data Fakultas</a>
            </div>

            <div class="row mt-3">
                <div class="col-md-5">
                    <div class="card">
                        <table class="table table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th scope="col">Nama Fakultas</th>
                                    <th scope="col">Program Studi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($jurusan as $j) : ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $j['jurusan'] ?></td>
                                        <td><?php echo $j['program'] ?></td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
</div>
</div>

<!-- End of Main Content -->