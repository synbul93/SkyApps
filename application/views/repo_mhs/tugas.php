<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="container-fluid">
        <!-- Form Upload Tugas -->
        <div class="row">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="<?= $user['name'] ?>" required>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
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
                                <label for="judul">Judul Tugas</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Tugas" required>
                                <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Tugas</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Tugas" required></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="dosen_tujuan">Pilih Dosen Tujuan:</label>
                                <select class="form-control" name="dosen_tujuan" id="dosen_tujuan" required>
                                    <option value="">-- Pilih Dosen --</option>
                                    <?php foreach ($dosen as $d) : ?>
                                        <option value="<?= $d['id'] ?>"><?= $d['name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('dosen_tujuan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="file" value="<?= set_value('file') ?>">
                                <label class="custom-file-label" for="file">Choose file</label>
                                <small class="form-text text-danger"><?= form_error('file') ?></small>
                            </div>
                            <br>
                            <br>
                            <button type="submit" name="upload_tugas" class="btn btn-primary">Kirim Tugas</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End Page Content -->