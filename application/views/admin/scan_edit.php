<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>

            <?= form_open_multipart('admin/scan_edit'); ?>
            <div class="form-group">
                <label for="nama_direktur" class="col-sm-4 col-form-label">Nama Direktur Akademik</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_direktur" name="nama_direktur" value="<?= $scan['nama_direktur'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="nomor_induk" class="col-sm-2 col-form-label">NIP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_induk" name="nomor_induk" value="<?= $scan['nomor_induk'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="semester" class="col-sm-2 col-form-label">Semester</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="semester" name="semester" value="<?= $scan['semester'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="tahun" name="tahun" value="<?= $scan['tahun'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="univ_name" class="col-sm-4 col-form-label">Nama Universitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="univ_name" name="univ_name" value="<?= $scan['univ_name'] ?>">
                </div>
            </div>
            <div class="form-group">
                <label for="image" class="col-sm-2 col-form-label">Cap</label>
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?= base_url('assets/img/scan_file/') . $scan['image']; ?>" class="img-thumbnail">
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

            <div class="form-group row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->