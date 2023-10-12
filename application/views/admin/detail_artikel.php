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
                                <h3 class="text-center"><?= $artikel['judul']; ?></h3>
                                <table class="table table-sm table-hover text-black">
                                    <tbody>
                                        <tr>
                                            <td class="col-lg-4">Oleh</td>
                                            <td class="col-lg-1">:</td>
                                            <td class="col-lg-7"><?= $artikel['oleh']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-4">Editor</td>
                                            <td class="col-lg-1">:</td>
                                            <td class="col-lg-7"><?= $artikel['editor']; ?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-lg-4">Reporter</td>
                                            <td class="col-lg-1">:</td>
                                            <td class="col-lg-7"><?= $artikel['reporter']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Waktu</td>
                                            <td>:</td>
                                            <td>
                                                <?= $artikel['waktu'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Ringkasan Berita</td>
                                            <td>:</td>
                                            <td>
                                                <?= $artikel['ringkasan_berita'] ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td>:</td>
                                            <td>
                                                <img src="<?= base_url('assets/img/artikel/') . $artikel['image'] ?>" width="70px">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> <!-- entry meta -->
                        </div>
                    </div>
                </div>
                <br>
                <div class="card">
                    <h5 class="card-header text-center">Isi Berita</h5>
                    <div class="card-body">
                        <p class="card-text text-black"> <?php if (empty($artikel['isi_berita'])) : ?>
                                Data Artikel Tidak Tersedia.
                            <?php endif; ?>
                            <?= $artikel['isi_berita']; ?></p>
                    </div>
                </div>
                <br>
                <a href="<?= base_url(); ?>admin/artikel" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
</div>