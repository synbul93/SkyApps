<section class="icon-boxes" class="icon-boxes mb-0">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 col-lg-12 aos-init aos-animate" data-aos="fade-up">
                        <div class="icon-box">
                            <div class="col-lg-12">
                                <form action="" method="post">

                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search..." name="keyword">
                                        <div class="input-group-append ">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</section>

<section id="blog" class="blog">
    <div class="container aos-init aos-animate" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-8 entries">
                <div class="entry col-md-12 mb-5 mb-md-5">
                    <div class="entry-meta">
                        <h2><?= $repository['judul']; ?></h2>
                        <table class="table table-sm table-hover text-sm">
                            <tbody>
                                <tr>
                                    <td class="col-lg-4">Penulis</td>
                                    <td class="col-lg-1">:</td>
                                    <td class="col-lg-7"><?= $repository['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor Induk</td>
                                    <td>:</td>
                                    <td><?= $repository['nrp']; ?></td>
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
                                    <td>Program</td>
                                    <td>:</td>
                                    <td><?= $repository['program']; ?></td>
                                </tr>
                                <tr>
                                    <td>File</td>
                                    <td>:</td>
                                    <td><?= $repository['file']; ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Input</td>
                                    <td>:</td>
                                    <td><?= $repository['tgl_input']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div> <!-- entry meta -->
                    <p></p>

                    <ul id="pills1" class="nav nav-pills nav-fill mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills1-tab1" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Files</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills1-tab2" type="button" role="tab" aria-controls="pills-home" aria-selected="false" tabindex="-1">Abstrak</button>
                        </li>
                    </ul>
                    <div id="pillsContent1" class="card-body tab-content p-0">
                        <div class="tab-pane fade show active" id="pills1-tab1" role="tabpanel" aria-labelledby="#pills-home-tab">
                            <p>
                            </p>
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-1">
                                        <img width="40" height="40" src="https://img.icons8.com/ios-glyphs/40/pdf-2.png" alt="pdf-2" />
                                        <!-- aaa -->
                                    </div>
                                    <div class="col-lg-10">
                                        <?php if ($repository['akses'] == 0) : ?>
                                            Abstrak <?= $repository['nama'] ?> <br>
                                            <span class="badge bg-info ">Terbatas</span>
                                        <?php elseif ($repository['akses'] == 1) : ?>
                                            <a href="<?= base_url('assets/file/upload/' . $repository['file']); ?>">Abstrak <?= $repository['nama'] ?><br></a>
                                            <span class="badge bg-success ">Public</span>
                                            <?php endif; ?>&nbsp;&nbsp;<i class="fas fa-upload">&nbsp;</i><?= $repository['dosen']; ?><br>» <?= $repository['penerbit']; ?><br>
                                    </div>
                                </div>
                            </div>
                            <!-- </div> -->
                            <hr>
                            <p></p>
                        </div>

                        <div class="tab-pane fade" id="pills1-tab2" role="tabpanel" aria-labelledby="#pills-home-tab">
                            <?php if (empty($repository['abstrak'])) : ?>
                                Data Abstrak Tidak Tersedia.
                            <?php endif; ?>
                            <?= $repository['abstrak']; ?>
                        </div>
                    </div>
                </div> <!-- end entry -->
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="sidebar">
                            <h3 class="sidebar-title">Artikel Terkait</h3>
                            <div class="sidebar-item categories">
                                <ul>
                                    <?php $count = 0; ?>
                                    <?php foreach ($repositorys as $rps) : ?>
                                        <?php if ($count < 7) : ?>
                                            <li>
                                                <div class="row">
                                                    <div class="col-lg-1">
                                                        <i class="bx bx-chevron-right"></i>
                                                    </div>
                                                    <div class="col-lg-11">
                                                        <a href="<?= base_url('home/detail/' . $rps['id']); ?>">
                                                            <?= $rps['judul']; ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php $count++; ?>
                                        <?php else : ?>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            </div><!-- End sidebar categories-->
                        </div>
                    </div><!-- End sidebar -->
                </div>
            </div>
        </div>
    </div>
</section>