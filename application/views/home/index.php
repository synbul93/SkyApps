<section class="home">
    <div class="home-overlay"></div>
    <div class="home-text">
        <h1><?= $profile['univ_name'] ?></h1>
    </div>
</section>

<section class="ag-format">
    <div class="ag-format-container">
        <h1>FAKULTAS</h1>
        <div class="ag-courses_box">
            <?php foreach ($jurusan as $j) : ?>
                <div class="ag-courses_item">
                    <a href="<?= base_url(); ?>home/fakultas/<?= $j['id']; ?>" class="ag-courses-item_link">
                        <div class="ag-courses-item_bg"></div>
                        <div class="ag-courses-item_title">
                            <i class="fas fa-fw fa-graduation-cap"></i>
                            <h1><?= $j['jurusan'] ?></h1>
                        </div>
                        <div class="ag-courses-item_date-box">
                            <span class="ag-courses-item_date">
                            </span>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="text-art">
    <h1>NEWS</h1>
</div>

<section class="articles" id="articles">
    <?php $count = 0; ?>
    <?php foreach ($artikel as $art) : ?>
        <?php if ($count < 3) : ?>
            <article>
                <div class="article-wrapper">
                    <figure>
                        <img src="<?= base_url('assets/img/artikel/') . $art['image']; ?>" class="img-thumbnail">
                    </figure>
                    <div class="article-body">
                        <h2><?= $art['judul'] ?></h2>
                        <p>
                            <?= $art['ringkasan_berita'] ?>
                        </p>
                        <a href="<?= base_url(); ?>home/art_detail/<?= $art['id']; ?>" class="read-more">
                            Read more <span class="sr-only"></span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                        <div class="article-time">
                            <p>
                                <?= $art['waktu'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            </article>
        <?php endif; ?>
        <?php $count++; ?>
    <?php endforeach; ?>

    <div class="more-news">
        <a href="<?= base_url(); ?>home/portalArtikel" class="btn btn-primary">More News</a>
    </div>
</section>