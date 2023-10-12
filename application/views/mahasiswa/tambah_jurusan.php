<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Add student data
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="jurusan">Departement</label>
                            <input type="text" name="jurusan" class="form-control" id="jurusan">
                            <small class="form-text text-danger"><?= form_error('jurusan') ?></small>
                        </div>
                        <div class="form-group">
                            <label for="program">Studi Program</label>
                            <input type="text" name="program" class="form-control" id="program">
                            <small class="form-text text-danger"><?= form_error('program') ?></small>
                        </div>
                        <button type="submit" name="tambahDataJurusan" class="btn btn-primary">Add Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>