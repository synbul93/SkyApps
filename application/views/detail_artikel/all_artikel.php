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
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-8 entries">
                        <div class="entry col-md-12 mb-5 mb-md-5">
                            <div class="entry-meta">
                                <h3 class="entry-title">
                                </h3>
                                <hr>
                            </div>
                            <?php foreach ($repository as $rps) : ?>
                                <div class="row">
                                    <div class="col-1">
                                        <span class="badge bg-info"><?= ++$start ?></span>
                                    </div>
                                    <div class="col-lg-11">
                                        <a href="<?= base_url('home/detail/' . $rps['id']); ?>"><?= $rps['judul'] ?></a><sup>&nbsp;<span class="badge bg-primary "><?= $rps['koleksi'] ?></span></sup>
                                        <br>
                                        <sup>
                                            <i class="fas fa-fw fa-users"></i> <?= $rps['nama'] ?>, &nbsp; <i class="fas fa-fw fa-user-tie"></i> <?= $rps['dosen'] ?>; </sup>
                                    </div>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                        </div><!-- End blog entries list -->
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- End blog sidebar -->
    </div>
    <!-- end row -->
    </div>
    </div>
    </div>
</section>



<!-- end container -->