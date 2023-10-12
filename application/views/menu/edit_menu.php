<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="h5 mb-4 text-gray-800"><?= $title ?></h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('menu/editmenu/' . $user_menu['id']) ?>" method="post">
                        <div class="form-group">
                            <label for="title">Menu Name</label>
                            <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name" value="<?= $user_menu['menu'] ?>">
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.container-fluid -->