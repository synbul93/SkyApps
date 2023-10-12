<section class="home">
    <div class="home-overlay"></div>
    <div class="home-text">
        <h1><?= $jurusan['jurusan']; ?></h1>
    </div>
</section>

<section class="icon-boxes" class="icon-boxes mb-0">
    <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12 col-lg-12 aos-init aos-animate" data-aos="fade-up">
                        <div class="icon-box">
                            <div class="col-lg-12">
                                <form action="<?= base_url('') ?>" method="post">

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

<section class="artikel">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch aos-init aos-animate" data-aos="fade-left">
                        <div class="content">
                            <h1 class="content-title">Artikel Terbaru</h1>
                            <hr>
                            <p></p>
                            <div class="container">
                                <div class="row">
                                    <?php $count = 0; ?>
                                    <?php foreach ($repository as $rps) : ?>
                                        <?php if ($count < 7) : ?>
                                            <div class="col-1 mr-0">
                                                <i class="fas fa-file"></i>
                                            </div>
                                            <div class="col-11 ml-0">
                                                <a href="<?= base_url(); ?>home/detail/<?= $rps['id']; ?>">
                                                    <h4><?= $rps['judul'] ?>
                                                </a></h4>
                                                <sup>
                                                    <i class="fas fa-fw fa-calender"></i><?= $rps['tgl_input'] ?>,
                                                    <i class="fas fa-fw fa-info"></i> <?= $rps['nrp'] ?>,
                                                    <i class="fas fa-fw fa-users"></i> <?= $rps['nama'] ?>,
                                                    <i class="fas fa-fw fa-user-tie"></i> <?= $rps['dosen'] ?>; </sup>
                                            </div>
                                            <?php $count++; ?>
                                        <?php else : ?>
                                            <?php break; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                            <p></p>
                        </div>
                    </div>
</section>

<section class="portfolio" class="portfoio">
    <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="content">
            <div class="card">
                <div class="card-body">
                    <h1 class="content-title">Program Studi</h1>
                    <hr>
                    <p></p>

                    <div class="row">

                        <div class="col-lg-12 d-flex justify-content-center">
                            <p></p>
                        </div>
                    </div>

                    <div class="row portfolio-container" style="position: relative; height: 408px;">
                        <?php foreach ($fakultas as $fks) : ?>
                            <div class="col-lg-4 col-md-3  portfolio-item buttons filter-S3">
                                <a href="<?= base_url(); ?>home/artikel/<?= $fks['id']; ?>" class="btn btn-primary active" aria-pressed=" true"><?= $fks['studi'] ?></a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>