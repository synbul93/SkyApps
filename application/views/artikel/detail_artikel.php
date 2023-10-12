<section class="section-11 block-color-01 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="row post-header">
                    <div class="col-12 col-md-8 col-lg-8">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <h2><?= $artikel['judul'] ?></h2>
                                <div class="meta-view">
                                    <p class="meta-view-line"><strong>Oleh : <?= $artikel['oleh'] ?></strong></p>
                                    <p class="meta-view-line"><strong>Editor : <?= $artikel['editor'] ?></strong></p>
                                    <p class="meta_news_posted_date"><time datetime=""><?= $artikel['waktu'] ?></time></p>
                                </div>
                            </div>
                        </div>
                        <img src="<?= base_url('assets/img/artikel/') . $artikel['image'] ?>" class="img-fluid image_news">
                        <div class="post-view view-image">
                            <?php
                            $isi_berita = $artikel['isi_berita'];
                            $paragraphs = explode("\n", $isi_berita);
                            foreach ($paragraphs as $paragraph) {
                                echo "<p>{$paragraph}</p>";
                            }
                            ?>
                            <br>
                            <p><strong>Reporter: <?= $artikel['reporter'] ?></strong></p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-lg-4 post-latest">
                        <div class="row">
                            <div class="col-12 pb-2">
                                <h4 class="font-weight-bold">Terbaru</h4>
                            </div>
                            <?php foreach ($artikels as $arts) : ?>
                                <div class="col-12 py-2 border-bottom-hidden">
                                    <div class="row">
                                        <div class="col-4">
                                            <a href="<?= base_url(); ?>home/art_detail/<?= $arts['id']; ?>">
                                                <img src="<?= base_url('assets/img/artikel/') . $arts['image']; ?>" alt="<?= $arts['judul'] ?>" class="img-fluid">
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <a href="<?= base_url(); ?>home/art_detail/<?= $arts['id']; ?>">
                                                <?= $arts['judul'] ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</section>