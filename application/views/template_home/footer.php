<!---contact--->
<section class="contact">
    <footer class="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6 footer-links">
                        <h4>Tautan</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#" target="_blank">Pusat Teknologi B'sky</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#" target="_blank">Perpustakaan B'sky</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#" target="_blank">Katalog Cetak Perpustakaan B'sky</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#" target="_blank">Direktorat Teknologi Informasi Bsky</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#" target="_blank">Perpustakaan Bandung</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h4>Kontak</h4>
                        <p>
                            UPT Perpustakaan B'SKY <br>
                            PUSAT TEKNOLOGI BSKY <br>
                            <a href="https://bsky.co.id"><strong>Ruang Kerja Bsky</strong></a>
                        </p>
                        <p>
                            <?= $profile['alamat'] ?><br><br>
                            <strong>Phone:</strong> <?= $profile['no_tel'] ?><br>
                            <strong>Email:</strong> <?= $profile['email'] ?><br>
                        </p>

                    </div>

                    <div class="col-lg-4 col-md-6 footer-info">
                        <h3>Media Sosial</h3>
                        <div class="social-links mt-3">
                            <a href="<?= $profile['twitter'] ?>" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="<?= $profile['fb'] ?>" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="<?= $profile['ig'] ?>" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="<?= $profile['wa'] ?>" class="whatsapp"><i class="bx bxl-whatsapp"></i></a>
                            <a href="<?= $profile['yt'] ?>" class="youtube"><i class="bx bxl-youtube"></i></a>
                        </div>
                        <p>
                        </p>
                        <hr>
                        <p></p>
                        <img src="<?= base_url('assets/img/profile/') . $profile['image']; ?>" width="100px" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                Copyright <strong><span>© Skyapps <?= date('Y') ?></span></strong>.
            </div>
            <div class="credits">
            </div>
        </div>
    </footer><!-- End Footer -->
</section>
<!---scroll-top--->
<a href="#" class="top"><i class='bx bx-up-arrow-alt'></i></a>

<script src="https://unpkg.com/scrollreveal"></script>

<!---custom js link--->
<script type="text/javascript" src="<?= base_url('assets/js/script.js'); ?>"></script>
<script type="text/javascript" src="<?= base_url('assets/js/slide.js'); ?>"></script>
<!-- Google tag (gtag.js) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

</body>

</html>