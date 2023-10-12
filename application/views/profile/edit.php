        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
            <div class="row">
                <div class="col-lg-8">
                    <?= form_open_multipart('profile/edit'); ?>
                    <div class="form-group">
                        <label for="univ_name" class="col-sm col-form-label">Nama Universitas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="univ_name" name="univ_name" value="<?= $profile['univ_name'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $profile['alamat'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ig" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ig" name="ig" value="<?= $profile['ig'] ?>">
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="fb" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fb" name="fb" value="<?= $profile['fb'] ?>">

                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="twitter" name="twitter" value="<?= $profile['twitter'] ?>">
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="yt" class="col-sm-2 col-form-label">Youtube</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="yt" name="yt" value="<?= $profile['yt'] ?>">
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="wa" class="col-sm-2 col-form-label">Whatsapp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="wa" name="wa" value="<?= $profile['wa'] ?>">
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="no" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_tel" name="no_tel" value="<?= $profile['no_tel'] ?>">
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $profile['email'] ?>">
                            <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label for="link" class="col-sm-2 col-form-label">link</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="link" name="link" value="<?= $profile['link'] ?>">

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-2">Logo</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $profile['image']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">Fav Icon</div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/favicon/') . $profile['favicon']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="favicon" name="favicon">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>
                </div>

                </form>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->