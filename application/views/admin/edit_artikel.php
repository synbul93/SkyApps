        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
            <div class="row">
                <div class="col-lg">

                    <div class="col-md-6">
                        <?= $this->session->flashdata('message'); ?>
                    </div>

                    <div class="col-sm-10">
                        <div class="card">
                            <div class="card-header">
                                Form Artikel
                            </div>
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="judul">Judul</label>
                                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $artikel['judul'] ?>">
                                        <small class=" form-text text-danger"><?= form_error('judul') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="ringkasan_berita">Ringkasan Berita</label>
                                        <textarea class="form-control" id="ringkasan_berita" name="ringkasan_berita" rows="3"><?= $artikel['ringkasan_berita'] ?></textarea>
                                        <small class="form-text text-danger"><?= form_error('ringkasan_berita') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="isi_berita">Isi Berita</label>
                                        <textarea class="form-control" id="isi_berita" name="isi_berita" rows="3"><?= $artikel['isi_berita'] ?></textarea>
                                        <small class="form-text text-danger"><?= form_error('isi_berita') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="editor">Editor</label>
                                        <input type="text" class="form-control" id="editor" name="editor" value="<?= $artikel['editor'] ?>">
                                        <small class=" form-text text-danger"><?= form_error('editor') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="editor">Editor</label>
                                        <input type="text" class="form-control" id="oleh" name="oleh" value="<?= $artikel['oleh'] ?>">
                                        <small class=" form-text text-danger"><?= form_error('oleh') ?></small>
                                    </div>
                                    <div class="form-group">
                                        <label for="editor">Editor</label>
                                        <input type="text" class="form-control" id="reporter" name="reporter" value="<?= $artikel['reporter'] ?>">
                                        <small class=" form-text text-danger"><?= form_error('reporter') ?></small>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image"><?= $artikel['image'] ?></label>
                                        </div>
                                    </div>
                                    <button type="submit" name="editDataArtikel" class="btn btn-primary">Edit Berita</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->