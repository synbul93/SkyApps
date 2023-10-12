<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- Page Heading -->
    <div class="row mt-3">
        <div class="col-md">
            <div class="card-body">
                <?php if (empty($mahasiswa)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data Tidak Ditemukan.
                    </div>
                <?php endif; ?>
                <div class="col-lg-8 entries">

                    <div class="entry col-md-12 mb-5 mb-md-5">

                        <div class="entry-meta">
                            <h2><?= $mahasiswa['nama']; ?></h2>
                            <table class="table table-sm table-hover text-sm">
                                <tbody>
                                    <tr>
                                        <td class="col-lg-4">Nama Lengkap</td>
                                        <td class="col-lg-1">:</td>
                                        <td class="col-lg-7"><?= $mahasiswa['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Induk</td>
                                        <td>:</td>
                                        <td>
                                            <?= $mahasiswa['nrp']; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Fakultas</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['jurusan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Program</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['program']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>:</td>
                                        <td><?= $mahasiswa['alamat']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> <!-- entry meta -->
                        <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">Kembali</a>
                        <a href="<?= base_url('mahasiswa/cetak_kartu/' . $mahasiswa['id']); ?>" class="btn btn-danger">Cetak Kartu</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>