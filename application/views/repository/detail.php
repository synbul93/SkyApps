<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg entries">
                <div class="card">
                    <div class="card-body">
                        <div class="entry col-md-12 mb-5 mb-md-5">
                            <div class="entry-meta">
                                <h3 class="text-center"><?= $repository['judul']; ?></h3>
                                <table class="table table-sm table-hover text-black">
                                    <tbody>
                                        <tr>
                                            <td class="col-lg-4">Penulis</td>
                                            <td class="col-lg-1">:</td>
                                            <td class="col-lg-7"><?= $repository['nama']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Induk</td>
                                            <td>:</td>
                                            <td>
                                                <?= $repository['nrp']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Dosen</td>
                                            <td>:</td>
                                            <td><?= $repository['dosen']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Koleksi</td>
                                            <td>:</td>
                                            <td><?= $repository['koleksi']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Penerbit</td>
                                            <td>:</td>
                                            <td><?= $repository['penerbit']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fakultas</td>
                                            <td>:</td>
                                            <td><?= $repository['fakultas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Program Studi</td>
                                            <td>:</td>
                                            <td><?= $repository['jurusan']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Program</td>
                                            <td>:</td>
                                            <td><?= $repository['program']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Akses</td>
                                            <td>:</td>
                                            <td><?php if ($repository['akses'] == 0) : ?>
                                                    <span class="badge bg-info text-white">Terbatas</span>
                                                <?php elseif ($repository['akses'] == 1) : ?>
                                                    <span class="badge bg-success text-white">Public</span>
                                            </td>
                                        <?php endif ?>
                                        </tr>
                                        <tr>
                                            <td>File</td>
                                            <td>:</td>
                                            <td><a href="<?= base_url('assets/file/upload/' . $repository['file']); ?>" class="badge badge-danger"><?= $repository['file']; ?></a></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Input</td>
                                            <td>:</td>
                                            <td>
                                                <?= $repository['tgl_input'] ?> </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- entry meta -->
                        </div>
                    </div>
                </div>
                <div class="card">
                    <h5 class="card-header text-center">Abstrak</h5>
                    <div class="card-body">
                        <p class="card-text text-black"> <?php if (empty($repository['abstrak'])) : ?>
                                Data Abstrak Tidak Tersedia.
                            <?php endif; ?>
                            <?= $repository['abstrak']; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>