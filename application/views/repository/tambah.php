<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header">
                        Add Repository Data
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= set_value('nama') ?>">
                                <small class="form-text text-danger"><?= form_error('nama') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" class="form-control" id="judul" value="<?= set_value('judul') ?>">
                                <small class=" form-text text-danger"><?= form_error('judul') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="abstrak">Abstrak</label>
                                <textarea class="form-control" id="abstrak" name="abstrak" rows="3" value="<?= set_value('abstrak') ?>"></textarea>
                                <small class=" form-text text-danger"><?= form_error('abstrak') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="nrp">Nomor Induk</label>
                                <input type="number" name="nrp" class="form-control" id="nrp" value="<?= set_value('nrp') ?>">
                                <small class="form-text text-danger"><?= form_error('nrp') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <select class="form-control" id="fakultas" name="fakultas">
                                    <?php foreach ($jurusan as $j) : ?>
                                        <option value="<?php echo $j['jurusan'] ?>"><?php echo $j['jurusan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                    <?php foreach ($fakultas as $fks) : ?>
                                        <option value="<?php echo $fks['studi'] ?>"><?php echo $fks['studi'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="dosen">Dosen</label>
                                <input type="text" name="dosen" class="form-control" id="dosen" value="<?= set_value('dosen') ?>">
                                <small class="form-text text-danger"><?= form_error('dosen') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="koleksi">Jenis Koleksi</label>
                                <input type="text" name="koleksi" class="form-control" id="koleksi" value="<?= set_value('koleksi') ?>">
                                <small class="form-text text-danger"><?= form_error('koleksi') ?></small>
                            </div>
                            <div class="form-group">
                                <label for="penerbit">Penerbit</label>
                                <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?= set_value('penerbit') ?>">
                                <small class="form-text text-danger"><?= form_error('penerbit') ?></small>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="tgl_input">Tanggal Input</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" name="tgl_input" class="form-control" id="tgl_input" value="<?= set_value('tgl_input') ?>">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-light d-block">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                        <small class="form-text text-danger"><?= form_error('tgl_input') ?></small>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="program">Program</label>
                                    <select class="form-control" id="program" name="program">
                                        <?php foreach ($program as $prs) : ?>
                                            <option value="<?php echo $prs['program'] ?>"><?php echo $prs['program'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="akses">Akses</label>
                                <select class="form-control" id="akses" name="akses">
                                    <option value="0">Terbatas</option>
                                    <option value="1">Public</option>
                                </select>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" value="<?= set_value('file') ?>">
                                <label class="custom-file-label" for="file">Choose file</label>
                                <small class="form-text text-danger"><?= form_error('file') ?></small>
                            </div>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Add Data</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->