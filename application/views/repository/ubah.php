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
                        Change Repository Data
                    </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama" value="<?= $repository['nama'] ?>">
                                <small class="form-text text-danger"><?= form_error('nama') ?></small>
                            </div>

                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="judul">Judul</label>
                                    <input type="text" name="judul" class="form-control" id="judul" value="<?= $repository['judul'] ?>">
                                    <small class=" form-text text-danger"><?= form_error('judul') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="abstrak">Abstrak</label>
                                    <textarea class="form-control" id="abstrak" name="abstrak" rows="3" value="<?= $repository['abstrak'] ?>"></textarea>
                                    <small class=" form-text text-danger"><?= form_error('abstrak') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="nrp">Nomor Induk</label>
                                    <input type="number" name="nrp" class="form-control" id="nrp" value="<?= $repository['nrp'] ?>">
                                    <small class=" form-text text-danger"><?= form_error('nrp') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="fakultas">Fakultas</label>
                                    <select class="form-control" id="fakultas" name="fakultas">
                                        <?php foreach ($jurusan as $j) : ?>
                                            <?php if ($j['jurusan'] == $repository['fakultas']) : ?>
                                                <option value="<?= $j['jurusan'] ?>" selected><?= $repository['fakultas'] ?></option>
                                            <?php else : ?>
                                                <option value="<?= $j['jurusan'] ?>"><?= $j['jurusan'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="jurusan">Jurusan</label>
                                    <select class="form-control" id="jurusan" name="jurusan">
                                        <?php foreach ($fakultas as $fks) : ?>
                                            <?php if ($fks['studi'] == $repository['jurusan']) : ?>
                                                <option value="<?= $fks['studi'] ?>" selected><?= $repository['jurusan'] ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $fks['studi'] ?>"><?php echo $fks['studi'] ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="dosen">Dosen</label>
                                    <input type="text" name="dosen" class="form-control" id="dosen" value="<?= $repository['dosen'] ?>">
                                    <small class="form-text text-danger"><?= form_error('dosen') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="koleksi">Koleksi</label>
                                    <input type="text" name="koleksi" class="form-control" id="koleksi" value="<?= $repository['koleksi'] ?>">
                                    <small class="form-text text-danger"><?= form_error('koleksi') ?></small>
                                </div>
                                <div class="form-group">
                                    <label for="penerbit">Penerbit</label>
                                    <input type="text" name="penerbit" class="form-control" id="penerbit" value="<?= $repository['penerbit'] ?>">
                                    <small class="form-text text-danger"><?= form_error('penerbit') ?></small>
                                </div>
                                <form class="row">
                                    <label for="tgl_input">Tanggal Input</label>
                                    <div class="col-5">
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" name="tgl_input" class="form-control" id="tgl_input" value="<?= $repository['tgl_input'] ?>">
                                            <small class="form-text text-danger"><?= form_error('tgl_input') ?></small>
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-light d-block">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="program">Program</label>
                                        <select class="form-control" id="program" name="program">
                                            <?php foreach ($program as $prs) : ?>
                                                <?php if ($prs['program'] == $repository['program']) : ?>
                                                    <option value="<?= $prs['program'] ?>" selected><?= $repository['program'] ?></option>
                                                <?php else : ?>
                                                    <option value="<?php echo $prs['program'] ?>"><?php echo $prs['program'] ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="akses">Akses</label>
                                        <select class="form-control" id="akses" name="akses">
                                            <option value="0">Terbatas</option>
                                            <option value="1">Public</option>
                                        </select>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="file" name="file" value="<?= $repository['file'] ?>">
                                        <label class="custom-file-label" for="file"><?= $repository['file'] ?></label>
                                    </div>
                    </div>
                    <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
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