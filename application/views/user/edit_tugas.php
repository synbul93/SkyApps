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
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="" value="<?= $tugas['nama'] ?>" required>
                                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="fakultas">Fakultas</label>
                                <select class="form-control" id="fakultas" name="fakultas">
                                    <?php foreach ($jurusan as $j) : ?>
                                        <option value="<?= $j['jurusan'] ?>"><?= $j['jurusan'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="judul">Judul Tugas</label>
                                <input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Tugas" value="<?= $tugas['judul'] ?>" required>
                                <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Tugas</label>
                                <textarea class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi Tugas" required><?= $tugas['deskripsi'] ?></textarea>
                                <?= form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="tgl_mulai">Dimulai Pada Tanggal</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" name="tgl_mulai" class="form-control" id="tgl_mulai" value="<?= $tugas['tgl_mulai'] ?>">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-light d-block">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                        <label for="tgl_akhir">Berakhir Pada Tanggal</label>
                                        <div class="input-group date" id="datepicker">
                                            <input type="text" name="tgl_akhir" class="form-control" id="tgl_akhir" value="<?= $tugas['tgl_akhir'] ?>">
                                            <span class="input-group-append">
                                                <span class="input-group-text bg-light d-block">
                                                    <i class="fa fa-calendar"></i>
                                                </span>
                                            </span>
                                        </div>
                                        <small class="form-text text-danger"><?= form_error('tgl_akhir') ?></small>
                                    </div>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="file">Choose file</label>
                                    <small class="form-text text-danger"><?= form_error('file') ?></small>
                                </div>
                                <br>
                                <br>
                                <br>
                                <button type="submit" name="edit_tugas_dosen" class="btn btn-primary">Edit Tugas</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- End Page Content -->
</div>